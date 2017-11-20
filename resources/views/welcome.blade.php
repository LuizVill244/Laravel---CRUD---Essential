<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>404...</title> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="container">
  <form class="four-oh-four-form">
    <input type="text" class="404-input">
  </form>

  <div class="terminal">
      <p class="prompt">La página que estas buscando no se encuentra dispoible, lo sentimos.</p>
      <p class="prompt output new-output"></p>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>

	<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>
