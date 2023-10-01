<?php
/**
 * Created by PhpStorm.
 * User: naveen
 * Date: 10/27/18
 * Time: 11:03 PM
 */
$st='http://funnymemes.me/'.$folder.'/'.$y.'/'.$m.'/'.$d.'/'.$image_name;
$st2='https://funnymemes.me/'.$folder.'/'.$y.'/'.$m.'/'.$d.'/'.$image_name;
?>


<meta property="og:image" content="{{ $st }}" />
<meta property="og:image:url" content="{{ $st }}" />
<meta property="og:image:secure_url" content="{{ $st2 }}" />
<meta property="og:image:type" content="image/jpeg" />

<meta property="og:site_name" content="<?php echo env('APP_NAME'); ?>">
<meta property="og:image:height " content="480">
<meta property="og:image:width" content="800">
<meta property="og:image:alt" content="{{ url('Apps/'.$app_ref) }}">


    {{--<meta property="og:image" content="{{ $image_path }}">--}}
    {{--<meta property="og:image:url" content="{{ $image_path }}">--}}


{{--<head prefix="og: https://fb.gg/play/srifunappnames# fb: https://fb.gg/play/srifunappnames# game: https://fb.gg/play/srifunappnames#">--}}
    {{--<meta property="fb:app_id"      content="445770672544176" />--}}
    {{--<meta property="og:type"        content="game" />--}}
    {{--<meta property="og:url"         content="https://fb.gg/play/srifunappnames" />--}}
    {{--<meta property="og:title"       content="Sample Game" />--}}
    {{--<meta property="og:image"       content="https://namefunapp.com/img/cover_funn.jpg" />--}}
    {{--<meta property="og:description" content="Sample Game Description" />--}}




<meta property="og:url" content="{{ $st2 }}">
<meta property="og:url" content="https://fb.gg/play/srifunappnames">


<meta property="og:type" content="article">
{{--<meta property="og:type" content="game">--}}


    <meta property="og:title" content="{{ $app_name }}">
    <meta property="og:description" content="{{ $app_description }}">
<meta property="fb:app_id" content="<?php echo  env('FACEBOOK_CLIENT_ID'); ?>">

{{--<meta http-equiv="refresh" content="1;URL='{{ url('Apps/'.$app_ref) }}'" />--}}
<meta http-equiv="refresh" content="1;URL='https://www.facebook.com/instantgames/play/1904512683007822/?context_source_id=Lover_First_Latter&context_type=LINK&source=www_play_url'" />

<div>


    <img style="display: none;
    margin-left: auto;
    margin-right: auto;
    width: 50%;" src="{{ $st2 }}">
</div>




