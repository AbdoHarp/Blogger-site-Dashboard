<!DOCTYPE html>
<html>

<head>
    <title>About Us - My Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    @include('layouts/inc/frontendnavbar')


    <main class="container my-5">
        <section class="row">
            <article class="col-md-6">
                <h1>About Us</h1>
                <p>Welcome to My Blog, your go-to source for all things related to [topic of your blog]. We're dedicated
                    to providing you with the latest news, tips, and insights in [topic of your blog], with a focus on
                    quality, accuracy, and relevance.</p>
                <p>Founded in [year], My Blog has come a long way from its beginnings. When [founder's name] first
                    started out, their passion for [topic of your blog] drove them to start their own blog.</p>
                <ul>
                    <li>We believe in [value or principle].</li>
                    <li>We are committed to [goal or mission].</li>
                    <li>Our team consists of [number of team members] passionate individuals who are experts in their
                        respective fields.</li>
                </ul>
            </article>
            <aside class="col-md-6">
                <img src="{{ asset('asstes/image/annie-spratt-QckxruozjRg-unsplash.jpg') }}" alt="Our Team"
                    class="img-fluid">
            </aside>
        </section>
    </main>

    @include('layouts/inc/frontendfooter')


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
