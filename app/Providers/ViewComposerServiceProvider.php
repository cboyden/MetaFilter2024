<?php

declare(strict_types=1);

namespace App\Providers;

use App\View\Composers\BannerLinks\BannerLinkViewComposer;
use App\View\Composers\Language\SwitchLanguageViewComposer;
use App\View\Composers\Navigation\CreatePostButtonViewComposer;
use App\View\Composers\Navigation\FooterLinksNavigationViewComposer;
use App\View\Composers\Navigation\FooterMemberLinksViewComposer;
use App\View\Composers\Navigation\FooterSubsiteNavigationViewComposer;
use App\View\Composers\Navigation\GlobalNavigationViewComposer;
use App\View\Composers\Navigation\SecondaryNavigationViewComposer;
use App\View\Composers\Navigation\PrimaryNavigationViewComposer;
use App\View\Composers\Navigation\UtilityNavigationViewComposer;
use App\View\Composers\Sidebar\TodayInHistoryViewComposer;
use App\View\Composers\Snippets\SnippetViewComposer;
use Illuminate\Support\ServiceProvider;

final class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer(
            'layouts.site-footer.footer-links-navigation',
            FooterLinksNavigationViewComposer::class,
        );

        view()->composer(
            'layouts.site-footer.footer-member-links-navigation',
            FooterMemberLinksViewComposer::class,
        );

        view()->composer(
            'layouts.site-footer.footer-subsite-navigation',
            FooterSubsiteNavigationViewComposer::class,
        );

        view()->composer(
            'layouts.navigation.partials.create-post-button',
            CreatePostButtonViewComposer::class,
        );

        view()->composer(
            'layouts.navigation.global-navigation',
            GlobalNavigationViewComposer::class,
        );

        view()->composer(
            'layouts.navigation.secondary-navigation',
            SecondaryNavigationViewComposer::class,
        );

        view()->composer(
            'forms.language.switch-language',
            SwitchLanguageViewComposer::class,
        );

        view()->composer(
            [
                'layouts.partials.help-fund-mefi',
            ],
            SnippetViewComposer::class,
        );

        view()->composer(
            'layouts.partials.site-banner',
            BannerLinkViewComposer::class,
        );

        view()->composer(
            'layouts.navigation.primary-navigation',
            PrimaryNavigationViewComposer::class,
        );

        view()->composer(
            'layouts.sidebars.partials.today-in-mefi-history',
            TodayInHistoryViewComposer::class,
        );

        view()->composer(
            'layouts.navigation.utility-navigation',
            UtilityNavigationViewComposer::class,
        );
    }
}
