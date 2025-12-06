<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
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

    public function contact(): View
    {
        return view('public.contact');
    }
}
