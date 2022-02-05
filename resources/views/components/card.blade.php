<div class="card">
    <div class="card-header">
      {{ $todoOrNote }}
    </div>
    <div class="card-body">
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ $count }}
      </span>
      <a href="/todo/create?key={{ $nameList }}" class="text-decoration-none text-light position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success" >
        <i class="fas fa-plus"></i>
      </a>
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $body }} <button class="bg-transparent border-0 text-decoration-underline" id="{{ $slug }}">Read More!</button></p>
    </div>
</div>