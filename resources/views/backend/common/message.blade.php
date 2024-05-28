
<script>
    @if (session()->get('success'))
      
    Swal.fire({
      toast: true,
      icon: 'success',
      title: "{{ session()->get('success') }}",
      animation: true,
      position: 'center-start',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

    @endif


    @if (session()->get('info'))
      
    Swal.fire({
      toast: true,
      icon: 'info',
      title: "{{ session()->get('info') }}",
      animation: true,
      position: 'center-start',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

    @endif


    @if (session()->get('warning'))
      
    Swal.fire({
      toast: true,
      icon: 'error',
      title: "{{ session()->get('warning') }}",
      animation: true,
      position: 'center-start',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
      })

    @endif

    @if (session()->get('done'))
      
      Swal.fire({
        toast: true,
        icon: 'success',
        title: "{{ session()->get('done') }}",
        animation: true,
        position: 'center-start',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
  
      @endif

    @if (session()->get('error'))
      
      Swal.fire({
        toast: true,
        icon: 'error',
        title: "{{ session()->get('error') }}",
        animation: true,
        position: 'center-start',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
  
      @endif
  </script>