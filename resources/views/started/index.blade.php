@extends('layouts.main')

@section('container')
  <div class="starter-container">
    <div class="header">
      <h1>Selamat Datang Di Website PT SATRIYO MEGA SARANA</h1>
    </div>
    <div class="content">
      <p>Mohon tunggu sebentar...</p>
    </div>
  </div>
@endsection

<style>
  /* CSS Styling */
  body {
    margin: 0; /* Remove default body margins */
    height: 100vh; /* Set body height to 100% of viewport */
    background-image: url("img/logo-pt.png"); /* Replace with your image path */
    background-size: cover; /* Fills the entire screen */
    background-repeat: no-repeat; /* Prevents image tiling */
    background-position: center; /* Centers the image */
  }

  .starter-container {
    position: relative; /* Allows positioning of elements within the background */
    max-width: 600px; /* Adjust as needed */
    margin: auto;
    padding: 20px;
    text-align: center;
    background-color: transparent; /* Remove container background */
  }

  .header {
    background-color: #3498db;
    color: #fff;
    padding: 15px;
    font-size: 1.2em;
  }

  .btn {
    /* Existing button styles */
  }

  .btn:hover {
    /* Existing hover effect */
  }
</style>

<script>
  // JavaScript for redirection after a delay
  document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
      window.location.href = "/kwitansi"; // Change this to your transaction data page URL
    }, 2000); // 2000 milliseconds = 2 seconds
  });
</script>
