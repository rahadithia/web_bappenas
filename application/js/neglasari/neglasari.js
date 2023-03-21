$(function(){
    //$("#dasawisma").select2("enable", false);

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
    $('#formdtctz').on('submit',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e);
    
        $.ajax({    
            type:"POST",
            url:'/dtctz/submit',
            data:$(this).serialize(),
            dataType: 'json',
            beforeSend: function(){
               $('#loader').modal('show');
            },
            success: function(data){
               $('#loader').modal('hide');
               Swal.fire(
                'Sukses!',
                'Data Berhasil Disimpan!',
                'success'
                ).then(function() {
                    window.location = "/dtctz";
                });

            },
            error: function(data){
                Swal.fire(
                    'Gagal!',
                    'Data Gagal Disimpan! Ulangi Beberapa Saat.',
                    'error'
                    )
            }
        })
        });

        $('#formdtctzkk').on('submit',function(e){
            $.ajaxSetup({
                header:$('meta[name="_token"]').attr('content')
            })
            e.preventDefault(e);
        
            $.ajax({    
                type:"POST",
                url:'/dtctzkk/submit',
                data:$(this).serialize(),
                dataType: 'json',
                beforeSend: function(){
                   $('#loader').modal('show');
                },
                success: function(data){
                   $('#loader').modal('hide');
                   Swal.fire(
                    'Sukses!',
                    'Data Berhasil Disimpan!',
                    'success'
                    ).then(function() {
                        window.location = "/dtctzkk";
                    });
    
                },
                error: function(data){
                    Swal.fire(
                        'Gagal!',
                        'Data Gagal Disimpan! Ulangi Beberapa Saat.',
                        'error'
                        )
                }
            })
        });

        $('#formdtctzrkprt').on('submit',function(e){
            $.ajaxSetup({
                header:$('meta[name="_token"]').attr('content')
            })
            e.preventDefault(e);
        
            $.ajax({    
                type:"POST",
                url:'/dtctzrkprt/submit',
                data:$(this).serialize(),
                dataType: 'json',
                beforeSend: function(){
                   $('#loader').modal('show');
                },
                success: function(data){
                   $('#loader').modal('hide');
                   Swal.fire(
                    'Sukses!',
                    'Data Berhasil Disimpan!',
                    'success'
                    ).then(function() {
                        window.location = "/dtctzrkprt/dtl";
                    });
    
                },
                error: function(data){
                    Swal.fire(
                        'Gagal!',
                        'Data Gagal Disimpan! Ulangi Beberapa Saat.',
                        'error'
                        )
                }
            })
        });


    });

    
      