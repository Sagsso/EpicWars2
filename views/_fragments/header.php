<nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">User's name</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="asyncLink nav-link" href="<?php print(URL); ?>initial">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="asyncLink nav-link" href="<?php print(URL); ?>characters">Characters</a>
          </li>
          <li class="nav-item">
            <a class="asyncLink nav-link" href="<?php print(URL); ?>arena">Arena</a>
          </li>
          <li class="nav-item">
            <a class="asyncLink nav-link" href="<?php print(URL); ?>history">History</a>
          </li>
        </ul>
      </div>
    </div>
</nav>