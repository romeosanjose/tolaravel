<!doctype html>
<head>
    <title>User Card - {{{ $user->getName() }}}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
</head>
<body class="is-preload">
<div id="wrapper">
    <section id="main">
        <header>
            @php
                $imagePath = 'images/users/'. $user->getId().'.jpg'
            @endphp
            <span class="avatar"><img src="{{asset($imagePath)}}" alt="" /></span>
            <h1>{{ $user->getName()}}</h1>
            <p>{!! nl2br(e($user->getComments())) !!}</p>
        </header>
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>

</div>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>