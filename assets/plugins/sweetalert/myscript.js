const flashData = $('.flash-data').data('flashdata');
  if (flashData) {
    Swal.fire({
        type: 'success',
        title: 'Sukses',
        text: '' + flashData,
    });
  }
