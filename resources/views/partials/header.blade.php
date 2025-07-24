<?php
if (!isset($currentPage)) {
    $currentPage = 'login';
}
?>
<div id="top">&nbsp;</div>

<div class="row logo-menu-container">
    <div class="hidden-xs hidden-sm col-md-12 col-lg-12 header-block">
        <div class="header-menu-left"><span onclick="gotoPage
        ('home');">Russ Etheridge</span></div>
        <div class="header-menu-right"><span id="showreelId" onclick="gotoPage('showreel');"
                                                                           onmouseover="$(this).addClass('white-link-hover');"
                                                                           onmouseout="$(this).removeClass('white-link-hover')">showreel</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="homeId" class="" onclick="filterByCategory('all');"
                                                                           onmouseover="$(this).addClass('white-link-hover');"
                                                                           onmouseout="$(this).removeClass('white-link-hover')">work</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="tutorialsId" onclick="gotoPage('tutorials');" onmouseover="$(this).addClass('white-link-hover')" onmouseout="$(this).removeClass('white-link-hover')">tutorials</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="aboutId" onclick="gotoPage('about');" onmouseover="$(this).addClass('white-link-hover')" onmouseout="$(this).removeClass('white-link-hover')">about</span></div>
    </div>
    <div class="hidden-xs hidden-sm col-md-12 col-lg-12 sub-header-block">
        <div class="header-menu-right"><span class="filter-label">Filter:</span><span id="all" onclick="filterByCategory('all');"
                                                                           onmouseover="$(this).addClass('white-link-hover');"
                                                                           onmouseout="$(this).removeClass('white-link-hover')">all</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="animator" onclick="filterByCategory('animator');" onmouseover="$(this).addClass('white-link-hover')" onmouseout="$(this).removeClass('white-link-hover')">animator</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="director" onclick="filterByCategory('director');" onmouseover="$(this).addClass('white-link-hover')" onmouseout="$(this).removeClass('white-link-hover')">director</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span  id="personal" onclick="filterByCategory('personal');" onmouseover="$(this).addClass('white-link-hover')"
                                                                 onmouseout="$(this).removeClass('white-link-hover')">personal</span><img class="square" src="{{config('app.base_url')}}img/square.png" /><span id="commercial" onclick="filterByCategory('commercial');" onmouseover="$(this).addClass('white-link-hover')"
                                                                 onmouseout="$(this).removeClass('white-link-hover')">commercial</span>
        </div>
    </div>
    <div class="hidden-xs col-sm-12 hidden-md hidden-lg header-block">
        <span id="showreelId" onclick="gotoPage('showreel');" onmouseover="$(this).addClass('white-link-hover');"
              onmouseout="$(this).removeClass('white-link-hover')">showreel</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span id="homeId" onclick="filterByCategory('all');" onmouseover="$(this).addClass('white-link-hover');"
              onmouseout="$(this).removeClass('white-link-hover')">work</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span id="tutorialsId" onclick="gotoPage('tutorials');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">tutorials</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span id="aboutId" onclick="gotoPage('about');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">about</span>
    </div>
    <div class="hidden-xs col-sm-12 hidden-md hidden-lg sub-header-block"><span class="filter-label">Filter:</span>
        <span id="all" onclick="filterByCategory('all');" onmouseover="$(this).addClass('white-link-hover');"
              onmouseout="$(this).removeClass('white-link-hover')">all</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span  id="animator" onclick="filterByCategory('animator');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">animator</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span  id="director" onclick="filterByCategory('director');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">director</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span id="personal" onclick="filterByCategory('personal');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">personal</span>
        <img class="square" src="{{config('app.base_url')}}img/square.png" />
        <span id="commercial" onclick="filterByCategory('commercial');" onmouseover="$(this).addClass('white-link-hover')"
              onmouseout="$(this).removeClass('white-link-hover')">commercial</span>
    </div>
    <div class="col-xs-12 hidden-sm hidden-md hidden-lg header-block">
        <table class="logo-menu-table">
            <tbody>
            <tr>
                <td class="logo-menu-table-left">
                    <span id="showreelId" class="white-link" onclick="gotoPage('showreel');" onmouseover="$(this).addClass('white-link-hover');"
                          onmouseout="$(this).removeClass('white-link-hover')">showreel</span>
                </td>
                <td class="square-vertical logo-menu-table-center"><img src="{{config('app.base_url')}}img/square.png"
                    /></td>
                <td class="logo-menu-table-right">
                    <span id="homeId" class="white-link" onclick="filterByCategory('all');" onmouseover="$(this).addClass('white-link-hover');"
                          onmouseout="$(this).removeClass('white-link-hover')">work</span>
                </td>
            </tr>
            <tr>
                <td class="logo-menu-table-left">
                    <span id="tutorialsId" class="white-link" onclick="gotoPage('tutorials');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')">tutorials</span>
                </td>
                <td class="square-vertical logo-menu-table-center"><img src="{{config('app.base_url')}}img/square.png"
                    /></td>
                <td class="logo-menu-table-right">
                    <span id="aboutId" class="white-link" onclick="gotoPage('about');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')">about</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xs-12 hidden-sm hidden-md hidden-lg sub-header-block"><span class="filter-label">Filter:</span>
        <table class="logo-menu-table">
            <tbody>
            <tr>
                <td class="logo-menu-table-left">
                    <span id="all" class="white-link" onclick="filterByCategory('all');" onmouseover="$(this).addClass('white-link-hover');"
                          onmouseout="$(this).removeClass('white-link-hover')">all</span>
                </td>
                <td class="square-vertical logo-menu-table-center"><img src="{{config('app.base_url')}}img/square.png"
                    /></td>
                <td class="logo-menu-table-right">
                    <span id="animator" class="white-link" onclick="filterByCategory('animator');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')">animator</span>
                </td>
            </tr>
            <tr>
                <td class="logo-menu-table-right">
                    <span id="director" class="white-link" onclick="filterByCategory('director');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')">director</span>
                </td>
                <td class="square-vertical logo-menu-table-center"><img src="{{config('app.base_url')}}img/square.png" /></td>
                <td class="logo-menu-table-left">
                    <span id="personal" class="white-link" onclick="filterByCategory('personal');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')
                                                    ">personal</span>
                </td>
                <td class="square-vertical logo-menu-table-center"><img src="{{config('app.base_url')}}img/square.png" /></td>
                <td class="logo-menu-table-left">
                    <span id="commercial" class="white-link" onclick="filterByCategory('commercial');" onmouseover="$(this).addClass('white-link-hover')"
                          onmouseout="$(this).removeClass('white-link-hover')
                                                    ">commercial</span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@section('global-scripts')
    <script type="text/javascript">
        function filterByCategory(category)
        {
            document.location = ("{{config('app.base_url')}}" + "home?category=" + category);
        }

        function gotoPage(aid)
        {
            if (
                    aid == "showreel"
                    || aid == "tutorials"
                    || aid == "about"
            ) {
                document.location = ("{{config('app.base_url')}}" + aid);
            } else {
                @if (Request::is('/') || Request::is('home'))
                    scrollToAnchor(aid);
                @else
                if (aid == "home") {
                    document.location = ("{{config('app.base_url')}}");
                } else {
                    document.location = ("{{config('app.base_url')}}" + "home#" + aid);
                }
                @endif
            }
        }

        function scrollToAnchor(aid)
        {
            var aTag = $("div[id='"+ aid +"']");
            $('html,body').animate({scrollTop: aTag.offset().top},'slow');
        }

        $(document).ready( function()
        {
            // On page load and on resize we check some aspects of the page to ensure responsiveness is correct
            addEvent(window, "resize", handleResizeEvent);
            // Calculate the apsect ratio now, so that it is correct on page load
            calcAspectRatio();
            // Also ensure that the About text panel is at least as high as the image panel
            calcAboutTextPanelHeight();

            // Check if we are filtering the output, if so set the underline to indicate which
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const category = urlParams.get('category');
            if (undefined !== category) {
                $(document.getElementById(category)).addClass('active-filter');
            }

            // Check which page we are on, if so set the underline to indicate which
            let thisPage = window.location.pathname.replace('/public', "").replace('/', "");
            console.log(thisPage);
            if (thisPage =='{{$currentPage}}') {
                $(document.getElementById(thisPage + 'Id')).addClass('active-filter');
            }
        });

    </script>
@endsection
