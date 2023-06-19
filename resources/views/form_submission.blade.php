<form method="POST" action="{{ route('submit') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="text" name="name"  id="form3Example3c" class="form-control" />
          <label class="form-label" for="form3Example3c">Your name</label>
        </div>
      </div>
      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="email" name="email" id="form3Example3c" class="form-control" />
          <label class="form-label" for="form3Example3c">Your Email</label>
        </div>
      </div>
      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <div class="form-outline flex-fill mb-0">
          <input type="text" name="message" id="form3Example3c" class="form-control" />
          <label class="form-label" for="form3Example3c">Your messa</label>
        </div>
      </div>

<button class="btn btn-primary w-100" type="submit">Update Account</button>
</form>
