@if (session('success'))
   <div class="alert alert-success">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true" class="close-me">×</span>
      </button>
   </div>
@endif

@if (session('warning'))
   <div class="alert alert-warning">
      {{ session('warning') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true" class="close-me">×</span>
      </button>
   </div>
@endif

@if (session('send'))
   <div class="alert alert-success">
      {{ session('send') }}
   </div>
@endif

{{-- ! Close Alert --}}
<script>
   let close = document.querySelector('.close-me');
   close.addEventListener('click', function() {
      let alert = document.querySelector('.alert');
      alert.style.display = 'none';
   });
</script>
{{-- ! /Close Alert --}}
