<style>
h4 {
    margin: 20px 10px 10px;
}
p {
    margin: 10px;
}

#carousel-example-generic {
    margin: 20px auto;
    width: 400px;
}

#carousel-custom {
    margin: 20px auto;
    width: 400px;
}
#carousel-custom .carousel-indicators {
    margin: 10px 0 0;
    overflow: auto;
    position: static;
    text-align: left;
    white-space: nowrap;
    width: 100%;
}
#carousel-custom .carousel-indicators li {
    background-color: transparent;
    -webkit-border-radius: 0;
    border-radius: 0;
    display: inline-block;
    height: auto;
    margin: 0 !important;
    width: auto;
}
#carousel-custom .carousel-indicators li img {
    display: block;
    opacity: 0.5;
}
#carousel-custom .carousel-indicators li.active img {
    opacity: 1;
}
#carousel-custom .carousel-indicators li:hover img {
    opacity: 0.75;
}
#carousel-custom .carousel-outer {
    position: relative;
}
</style>

<div class="container">




<p>Below is the carousel example copied from the Bootstrap documentation.</p>

<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
    <!-- Indicators -->
    <ol class='carousel-indicators'>
        <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
        <li data-target='#carousel-example-generic' data-slide-to='1'></li>
        <li data-target='#carousel-example-generic' data-slide-to='2'></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class='carousel-inner'>
        <div class='item active'>
            <img src='http://placehold.it/400x200&text=slide1' alt='' />
        </div>
        <div class='item'>
            <img src='http://placehold.it/400x200&text=slide2' alt='' />
        </div>
        <div class='item'>
            <img src='http://placehold.it/400x200&text=slide3' alt='' />
        </div>
    </div>

    <!-- Controls -->
    <a class='left carousel-control' href='#carousel-example-generic' data-slide='prev'>
        <span class='glyphicon glyphicon-chevron-left'></span>
    </a>
    <a class='right carousel-control' href='#carousel-example-generic' data-slide='next'>
        <span class='glyphicon glyphicon-chevron-right'></span>
    </a>
</div>

<p>Below is an altered example that shows the indicators as thumbnails in a scrollable strip. This was accomplished with two markup changes and some CSS changes.</p>

<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <!-- Wrapper for slides -->
        <div class='carousel-inner'>
            <div class='item active'>
                <img src='../gallery/images/1.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/2.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/3.jpg' alt='' />
            </div>

            <div class='item'>
                <img src='../gallery/images/4.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/5.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/6.jpg' alt='' />
            </div>

            <div class='item'>
                <img src='../gallery/images/7.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/8.jpg' alt='' />
            </div>
            <div class='item'>
                <img src='../gallery/images/9.jpg' alt='' />
            </div>
        </div>

        <!-- Controls -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>

    <!-- Indicators -->
    <ol class='carousel-indicators mCustomScrollbar'>
        <li data-target='#carousel-custom' data-slide-to='0' class='active'><img src='../gallery/images/1.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='1'><img src='../gallery/images/2.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='2'><img src='../gallery/images/3.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='3'><img src='../gallery/images/4.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='4'><img src='../gallery/images/5.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='5'><img src='../gallery/images/6.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='6'><img src='../gallery/images/7.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='7'><img src='../gallery/images/8.jpg' alt='' style="height:50px"/></li>
        <li data-target='#carousel-custom' data-slide-to='8'><img src='../gallery/images/9.jpg' alt='' style="height:50px"/></li>
    </ol>
</div>

<h4>Markup Changes</h4>
<p>First thing the indicators ordered list is moved to be beneath the controls and slides from its usual spot above.</p>
<p>Then the controls and slides are wrapped in a div given the class name "carousel-outer".</p>

<h4>CSS Changes</h4>
<p>Many changes were made to the CSS to override the standard Bootstrap CSS.</p>
<p>The indicators ordered list was made to have a static position so that it would display beneath the slides as intended. Then properties for overflow, text-align, white-space, and width were changed to make it a scrollable element that fits nicely at the bottom.</p>
<p>Each list item in this list were changed solely for behavior in that they don't necessarily change based on the "active" class being applied to them as the slides transition. For this example it wasn't needed but you can experiment with if something is needed.</p>
<p>We make sure our images will be displayed as block to maintain size and spacing as we wish. The images are sized placeholders to there's no sizing set within the img elements nor the CSS. This may be needed depending on your implementation.</p>
<p>Then, for our new "carousel-outer" class we set the position property to relative. The reason for this, and the sole reason this div exists, is to force the left/right controls to set their height appropriately. Without this div and property the left/right controls would expand downward into the thumbnails below.</p>

<h4>Javascript</h4>
<p>None.</p>
<p>Although, one should be able to expand on this to force the active thumbnail to always be visible within the strip.</p>

<h4>Tested Browsers</h4>
<p><strong>Works:</strong> Firefox, Chrome, Safari, IE8 to 11</p>
<p><strong>Fails:</strong> IE7 due to lack of support for how I'm using white-space: nowrap.</p>



</div>


<script>
$(document).ready(function() {
    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
});
</script>
