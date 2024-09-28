<!DOCTYPE html>
<html lang="en">

<head>
@include('home.homecss')
</head>

<body class="index-page">

  @include('home.header')

  <main class="main">

    <!-- /Hero Section -->
    @include('home.hero')

    <!-- Get Started Section -->
    {{-- @include('home.getStarted') --}}

    <!-- Constructions Section -->
   @include('home.construction')

    <!-- Services Section -->
   @include('home.service')

    <!-- Recent Blog Posts Section -->
    @include('home.blog')

  </main>
    <!-- Footer -->
  @include('home.footer')

</body>

</html>