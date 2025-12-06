<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $latestNews = News::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $upcomingEvents = Event::published()
            ->upcoming()
            ->take(4)
            ->get();

        return view('public.home', compact('latestNews', 'upcomingEvents'));
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function services(): View
    {
        return view('public.services');
    }

    public function newsIndex(): View
    {
        $news = News::published()
            ->latest('published_at')
            ->paginate(9);

        return view('public.news.index', compact('news'));
    }

    public function newsShow(News $news): View
    {
        abort_unless($news->status === 'published', 404);

        $relatedNews = News::published()
            ->where('id', '!=', $news->id)
            ->where('category', $news->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.news.show', compact('news', 'relatedNews'));
    }

    public function eventsIndex(): View
    {
        $upcomingEvents = Event::published()
            ->upcoming()
            ->paginate(8);

        $pastEvents = Event::published()
            ->past()
            ->take(4)
            ->get();

        return view('public.events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function eventsShow(Event $event): View
    {
        abort_unless($event->status === 'published', 404);

        $relatedEvents = Event::published()
            ->upcoming()
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('public.events.show', compact('event', 'relatedEvents'));
    }

    public function membersCatalog(Request $request): View
    {
        $query = Member::active()
            ->inCatalog()
            ->with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'ilike', "%{$search}%")
                    ->orWhere('main_activity', 'ilike', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('membership_category_id', $request->category);
        }

        $members = $query->orderBy('company_name')
            ->paginate(12);

        $categories = \App\Models\MembershipCategory::orderBy('name')->get();

        return view('public.members.catalog', compact('members', 'categories'));
    }

    public function contact(): View
    {
        return view('public.contact');
    }
}
