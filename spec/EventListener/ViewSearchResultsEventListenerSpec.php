<?php

namespace spec\Setono\SyliusAnalyticsPlugin\EventListener;

use Setono\SyliusAnalyticsPlugin\EventListener\ViewSearchResultsEventListener;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ViewSearchResultsEventListenerSpec extends ObjectBehavior
{
    function let(SessionInterface $session): void
    {
        $this->beConstructedWith($session);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(ViewSearchResultsEventListener::class);
    }

    function it_add_view_search_results_event(

        SessionInterface $session
    ): void
    {
        $session->has('google_analytics_events')->willReturn(true);

        $session->get('google_analytics_events')->shouldBeCalled();

        $session->set('google_analytics_events' ,[['name' => 'ViewSearchResults']])->shouldBeCalled();

        $this->viewSearchResults();
    }

    function it_cannot_add_view_search_results_event(
        SessionInterface $session
    ): void
    {
        $session->has('google_analytics_events')->willReturn(false);

        $session->set('google_analytics_events', [])->shouldBeCalled();

        $session->get('google_analytics_events')->shouldBeCalled();

        $session->set('google_analytics_events' ,[['name' => 'ViewSearchResults']])->shouldBeCalled();

        $this->viewSearchResults();
    }
}
