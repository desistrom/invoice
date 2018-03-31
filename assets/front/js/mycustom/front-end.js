$('body').ready(function(){

	// =======================================================      for handle login page (login module)
	$('#login-page #login-form').submit(function(e){
		e.preventDefault();
		var url = url;
    	$.ajax({
    		beforeSend: function() {
			    $('#login-page #loadingDiv').show();
		  	},
    		'url' : site_url + 'login',
    		'method' : 'post',
    		'dataType' : 'json',
    		'data': $('#login-page #login-form').serialize()
    	}).done(function(data){
    		console.log(data);
            if(data.notif == 1){
                window.location.href = data.url;
            }else{
                $('#login-page #login-form #ntf_username').html(data.error.ntf_username);
                $('#login-page #login-form #ntf_password').html(data.error.ntf_password);
                $('#login-page #login-form #ntf_not_match').html(data.error.ntf_error);
                $('#login-page #login-form .alert.alert-danger').show();
            }
	      	$('#login-page #loadingDiv').hide();
    	}).fail(function(xhr, status, error){
    		alert(xhr.responseText);
    	});
	});


    // =======================================================      for handle register page (login module)
    $('#login-page #register-form').submit(function(e){
        e.preventDefault();
        var url = url;
        $.ajax({
            beforeSend: function() {
                $('#login-page #loadingDiv').show();
            },
            'url' : site_url + 'login',
            'method' : 'post',
            'dataType' : 'json',
            'data': $('#login-page #register-form').serialize()
        }).done(function(data){
            console.log(data);
            if(data.notif == 1){
                window.location.href = data.url;
            }else{
                $('#login-page #register-form #ntf_email').html(data.error.ntf_email);
                $('#login-page #register-form #ntf_register').html(data.error.ntf_register);
                $('#login-page #register-form #ntf_username').html(data.error.ntf_username);
                $('#login-page #register-form #ntf_password').html(data.error.ntf_password);
                $('#login-page #register-form #ntf_retype_password').html(data.error.ntf_retype_password);
                $('#login-page #register-form #ntf_not_match').html(data.error.ntf_error);
                $('#login-page #register-form .alert.alert-danger').show();
            }
            $('#login-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText);
        });
    });


    // =======================================================      for handle  reset password page
    $('#reset-page #reset-form').submit(function(e){
        e.preventDefault();
        var url = url;
        $.ajax({
            beforeSend: function() {
                $('#reset-page #loadingDiv').show();
            },
            'url' : site_url + 'login/resetpassword',
            'method' : 'post',
            'dataType' : 'json',
            'data': $('#reset-page #reset-form').serialize()
        }).done(function(data){
            if(data.status == 1){
                $('#reset-page #box_notif').removeClass('alert-info').addClass('alert-success');
                $('#reset-page .alert p').html(data.notif);
                $('#reset-page #ntf_reset').html('');
                $("#reset-page #reset-form").trigger("reset");
            }else{
                $('#reset-page #ntf_reset').html(data.notif);
                $('#reset-page #ntf_reset').show();
            }
            $('#reset-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
    });

    // =======================================================      for handle  change password page
     $('.change-password-page #change-password-form').submit(function(e){
        e.preventDefault();
        var url = url;
        $.ajax({
            beforeSend: function() {
                $('#reset-page #loadingDiv').show();
            },
            'url' : site_url + 'login/change_password',
            'method' : 'post',
            'dataType' : 'json',
            'data': $('.change-password-page #change-password-form').serialize()
        }).done(function(data){
            if(data.status == 1){
                if(data.state == 1){
                    $('.change-password-page .alert #ntf_success').html(data.notif.result);
                    $('.change-password-page .alert').show();
                    $(".change-password-page #change-password-form").trigger("reset");
                }else{
                    $('.change-password-page .alert #ntf_success').html(data.notif.result);
                    $('.change-password-page .alert').show();
                }
            }else{
                $('.change-password-page .alert').hide();
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style': 'italic' });
            });
            $('.change-password-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
    });

    //========================================================      for handle change profile page (employer module)
    $('#employer-edit-profile-page #edit-profile-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function(){
                $('employer-edit-profile-page #loadingDiv').show();
            },
            'url' : site_url + 'employer/edit_profile',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#employer-edit-profile-page #edit-profile-form').serializeArray()
        }).done(function(data){
            console.log(data);
            if(data.status == 1){
                if(data.state == 1){
                    console.log('berhasil');
                    $('#employer-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#employer-edit-profile-page .alert').show();
                    $("#employer-edit-profile-page #change-password-form").trigger("reset");
                }else{
                    $('#employer-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#employer-edit-profile-page .alert').show();
                }
            }else{
                $('#employer-edit-profile-page .alert').hide();
                }
                $.each(data.notif,function(key,value){
                    $('#ntf_' + key).html(value);
                    $('#ntf_' + key).css({'color' : 'red', 'font-style' : 'italic'});
                });
            $('#employer-edit-profile-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    }); 

    // =======================================================      for handle  change profile page (employ module)


    $('#employ-edit-profile-page #edit-profile-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#employ-edit-profile-page #loadingDiv').show();
            },
            'url' : site_url + 'employ/edit_profile',
            'method' : 'post',
            'dataType' : 'json',
            'data': $('#employ-edit-profile-page #edit-profile-form').serialize()
        }).done(function(data){
            if(data.status == 1){
                if(data.state == 1){
                    $('#employ-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#employ-edit-profile-page .alert').show();
                    $("#employ-edit-profile-page #change-password-form").trigger("reset");
                }else{
                    $('#employ-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#employ-edit-profile-page .alert').show();
                }
            }else{
                $('#employ-edit-profile-page .alert').hide();
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style': 'italic' });
            });
            $('#employ-edit-profile-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
    });

    // ======================================================      for handle upload file
  /*  $('#trainer-edit-profile-page #edit-profile-form input[type=file]').on('change','#foto_profil',function(e){
        var data = new FormData();
        e.preventDefault();
        $.ajax({
            'url' : site_url 'trainer/edit_profile',
            'data' : data,
            'dataType' : 'json',
            'method' : 'post'
        }).done(function(data){
            console.log(data);
        });
    }); */

   // =======================================================      for handle  change profile page (trainer module)
    $('#trainer-edit-profile-page #edit-profile-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#trainer-edit-profile-page #loadingDiv').show();
            },
            'url' : site_url + 'trainer/edit_profile',
            'method' : 'post',
            'dataType' : 'json',
            'data': $('#trainer-edit-profile-page #edit-profile-form').serialize()
        }).done(function(data){
            console.log(data);
            console.log(file_data);
            if(data.status == 1){
                if(data.state == 1){
                    $('#trainer-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#trainer-edit-profile-page .alert').show();
                    $("#trainer-edit-profile-page #change-password-form").trigger("reset");
                }else{
                    $('#trainer-edit-profile-page .alert #ntf_success').html(data.notif.result);
                    $('#trainer-edit-profile-page .alert').show();
                }
            }else{
                $('#trainer-edit-profile-page .alert').hide();
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style': 'italic' });
            });
            $('#trainer-edit-profile-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
    });

    // =======================================================      for handle pembelian paket page (employer module)
    $('#employer-paket-page .form-paket').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function(){
                $('#employer-edit-profile-page #loadingDiv').show();
            },
            'url' : site_url + 'employer/paket',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $(this).serialize()
        }).done(function(data){
         //   window.location.href = data.url;
            if (data.state == 1){
                setTimeout(function(){
                    window.location.href = data.url;
                }, 1000);
            }
            $('#employer-paket-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

// ===================================================== for handle paket trainer page (trainer module)
    $('#trainer-paket-page .form-paket').submit(function(e){
        e.preventDefault();       
        $.ajax({
            beforeSend: function(){
                $('#trainer-paket-page #loadingDiv').show();
            },
            'url' : site_url + 'trainer/purchasing',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $(this).serialize()
        }).done(function(data){
                if(data.state == 1){
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
                }

                
            $('#trainer-paket-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

//====================================================== for handle upload photo training
    $('trainer-propose-training-page #cover').change(function(e){
        $.ajax({
            'url' : site_url + 'trainer/propose',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#trainer-propose-training-page #cover').serialize()
        });
    });

// ===================================================== for handle propose training page (trainer module)
    $('#trainer-propose-training-page #propose-training-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#trainer-propose-training-page #loadingDiv').show();
            },
            'url' : site_url + 'trainer/propose',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#trainer-propose-training-page #propose-training-form').serialize()

        }).done(function(data){
            console.log(data);

            if(data.status == 1){
                    $('#trainer-propose-training-page .alert #propose-training-form').html(data.notif.result);
                    
                    $('#trainer-propose-training-page #propose-training-form').trigger('reset');
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
            }else{
                $('#trainer-propose-training-page .alert #ntf_success').html(data.notif.result);
                $('#trainer-propose-training-page .alert').show();
            }
                
            
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style':'italic'});
            });
            $('#trainer-propose-training-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });
    //=========================================================================     edit_training (edit_training page)
    $('#trainer-edit-propose-training-page #edit-propose-training-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#trainer-edit-propose-training-page #loadingDiv').show();
            },
            'url' : site_url + 'trainer/edit_training/' + window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#trainer-edit-propose-training-page #edit-propose-training-form').serialize()

        }).done(function(data){
            console.log(data);

            if(data.status == 1){
                if(data.state == 1){
                    $('#trainer-edit-propose-training-page .alert #edit-propose-training-form').html(data.notif.result);
                    $('#trainer-edit-propose-training-page .alert').show();
                    $('#trainer-edit-propose-training-page #edit-propose-training-form').trigger('reset');
                        window.location.href = data.url;
                }else{
                    $('#trainer-edit-propose-training-page .alert #ntf_success').html(data.notif.result);
                    $('#trainer-edit-propose-training-page .alert').show();
                }
                
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style':'italic'});
            });
            $('#trainer-edit-propose-training-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

    //  ========================================================    add form

    // =======================================================      for handle plus jadwal form (trainer propose page)

    $('body').on('click','.add-jadwal',function(){
        var jadwal_id = parseInt($('.jadwal-value:last').attr('id').split('-')[1]);
        jadwal_id = jadwal_id + 1;
        console.log(jadwal_id);
        var data = "<div class='contact_form-jadwal'><div class='row' id='form-jadwal'><div class='col-md-4 col-sm-12'><label>Tanggal Mulai</label><input type='date' name='jadwal_mulaii[]' placeholder='jadwal mulai training' class='form-control'><span id='ntf_jadwal_mulai'></span></div><div class='col-md-4 col-sm-12'><label>Hari pelaksanaan</label><input type='text' name='harii[]' placeholder='hari pelaksanaan training' class='form-control'><span id='ntf_hari'></span></div><div class='col-md-4 col-sm-12'><label>Tempat Training</label><input type='text' name='tempat_trainingi[]' placeholder='tempat training' class='form-control'><span id='ntf_tempat_training'></span></div><div class='col-md-3 col-sm-12'><label>Tanggal berahir</label><input type='date' name='jadwal_selesaii[]' placeholder='jadwal selesai training' class='form-control'><span id='ntf_jadwal_selesai'></span></div><div class='col-md-4 col-sm-12'><label>Jam Pelaksanaan</label><input type='text' name='jam_jadwali[]' placeholder='jumlah jam pelaksanaan' class='form-control'><span id='ntf_jam_jadwal'></span></div><div class='col-md-4 col-sm-12'><label>Jumlha Peserta</label><input type='number' name='jml_pesertai[]' class='form-control'><span id='ntf_jml_peserta'></span></div><div class='col-md-1 col-sm-12'><button type='button' class='btn btn-success add-jadwal'><i class='fa fa-plus-circle fa-2x'></i></button><button type='button' class='btn btn-danger remove-jadwal'><i class='fa fa-times-circle fa-2x'></i></button></div><div class='jadwal-value' id='id_jadwal-"+ jadwal_id +"'></div><br/><br/></div></div>";
        $('#form-jadwal').append(data);
    });

    $('body').on('click','.remove-jadwal',function(){
        var jadwal_id = $('.jadwal-value:last').attr('id').split('-')[2];
        $('#form-jadwal-' + jadwal_id).html('');
        $(this).parent().parent().remove();
    });

    $('body').on('click','.add-menu',function(){
        var id_menu = parseInt($('.result-value:last').attr('id').split('-')[1]);
        id_menu = id_menu + 1;
        console.log(id_menu)
        var data = "<div class='form-group contact_form-1'><form class='row' id='form-detail-training'><div class='col-md-3 col-sm-12'><select class='form-control menu-value' name='tipe[]' id='jk-id-"+ id_menu +"'><option value=''>-jenis kegiatan-</option><?php  foreach ($dt_tipe as $key => $value) : ?><?php  endforeach; ?></select></div><div class='col-md-5 col-sm-12'><input type='text' name='kegiatan[]' class='form-control menu-value' placeholder='Kegiatan' id='k-id-"+ id_menu +"'></div><div class='col-md-3 col-sm-12'><input type='text' class='form-control menu-value' name='waktu[]' placeholder='Waktu' id='w-id-"+ id_menu +"'></div><div class='col-md-1 col-sm-12'><button type='button' class='btn btn-success add-menu'><i class='fa fa-plus-circle fa-2x'></i></button><button type='button' class='btn btn-danger remove-menu'><i class='fa fa-times-circle fa-2x'></i></button></div><div class='result-value' id='result-menu-"+ id_menu +"'></div></form></div>"
        $('#add-menu').append(data);
    });

    $('body').on('click','.remove-menu',function(){
        var id_menu = $('.result-value:last').attr('id').split('-')[2];
        console.log(id_menu);
        $('#result-menu-' + id_menu).html('');//css('display','none');
        $(this).parent().parent().remove();
    });

    // =======================================================     for handle  propose job page (employ module)
    $('#employer-propose-job-page #propose-job-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#employer-propose-job-page #loadingDiv').show();
            },
            'url' : site_url + 'employer/propose',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#employer-propose-job-page #propose-job-form').serialize()

        }).done(function(data){
            console.log(data);

            if(data.status == 1){
                if(data.state == 1){
                    $('#employer-propose-job-page .alert #propose-job-form').html(data.notif.result);
                    $('#employer-propose-job-page .alert').show();
                    $('#employer-propose-job-page #propose-job-form').trigger('reset');
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
                }else{
                    $('#employer-propose-job-page .alert #ntf_success').html(data.notif.result);
                    $('#employer-propose-job-page .alert').show();
                }
                
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style':'italic'});
            });
            $('#employer-propose-job-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

    // ===============================================================      handle for add menu join training
    

     // ==============================================================       handle for form join training at home
     $('#join-training-page #form-join-training').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#join-training-page #loadingDiv').show();
            },
            'url' : site_url + 'home/join_training/' + window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#join-training-page #form-join-training').serialize()

        }).done(function(data){
            console.log(data);

            if(data.status == 1){
                
                    $('#join-training-page .alert #form-join-training').html(data.notif.result);
                    $('#join-training-page .alert').show();
                    $('#join-training-page #form-join-training').trigger('reset');
                    
                }else{
                    $('#join-training-page .alert #ntf_success').html(data.notif.result);
                    $('#join-training-page .alert').show();
                
                
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style':'italic'});
            });
            $('#join-training-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });
    /*$('#join-training-page  #form-join-training').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#join-training-page #loadingDiv').show();
            },
            'url' : site_url + 'home/join_training'+ window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
            'method' ; 'post',
            'dataType' : 'json',
            'data' : $('#join-training-page #form-join-training').serializeArray()
        }).done(function(data){
            if(data.status == 1){
                $('#join-training-page .alert #form-join-training').html(data.notif.result);
                $('#join-training-page .alert').show();
                $('#join-training-page #form-join-training').trigger('reset');
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red','font-style':'italic'});
            });
            $('#join-training-page #loadingDiv').hidde();
        }).fail(function(xhr,status,error){
            alert(xhr.responseText + error);
        });
    });*/

    //================================================================       handle for edit job page
    $('#employer-edit-job-page #edit-job-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function() {
                $('#employer-edit-job-page #loadingDiv').show();
            },
            'url' : site_url + 'employer/edit_job/' + window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#employer-edit-job-page #edit-job-form').serialize()

        }).done(function(data){
            console.log(data);

            if(data.status == 1){
                if(data.state == 1){
                    $('#employer-edit-job-page .alert #edit-job-form').html(data.notif.result);
                    $('#employer-edit-job-page .alert').show();
                    $('#employer-edit-job-page #edit-job-form').trigger('reset');
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
                }else{
                    $('#employer-edit-job-page .alert #ntf_success').html(data.notif.result);
                    $('#employer-edit-job-page .alert').show();
                }
                
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color':'red', 'font-style':'italic'});
            });
            $('#employer-edit-job-page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

    // ======================================================       for handle create topik(forum page)
    $('#create_topik_page #create-topik-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function(){
                $('#create_topik_page #loadingDiv').show();
            },
            'url' : site_url + 'forum/create_topik',
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#create_topik_page #create-topik-form').serialize()
        }).done(function(data){
            console.log(data);
            if (data.status == 1) {
                if (data.state == 1) {
                    $('#create_topik_page .alert #ntf_success').html(data.notif.result);
                    $('#create_topik_page .alert').show();
                    $('#create_topik_page #create-topik-form').trigger("reset");
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
                }else{
                    $('#create_topik_page .alert #ntf_success').html(data.notif.result);
                    $('#create_topik_page .alert').show();
                }
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color' : 'red', 'font-style' : 'italic'});
            });
            $('#create_topik_page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });

    // ======================================================       for handle edit topik(forum page)
    $('#edit_topik_page #edit-topik-form').submit(function(e){
        e.preventDefault();
        $.ajax({
            beforeSend: function(){
                $('#edit_topik_page #loadingDiv').show();
            },
            'url' : site_url + 'forum/update_topik/'+window.location.href.substring(window.location.href.lastIndexOf('/') + 1),
            'method' : 'post',
            'dataType' : 'json',
            'data' : $('#edit_topik_page #edit-topik-form').serialize()
        }).done(function(data){
            console.log(data);
            if (data.status == 1) {
                if (data.state == 1) {
                    $('#edit_topik_page .alert #ntf_success').html(data.notif.result);
                    $('#edit_topik_page .alert').show();
                    $('#edit_topik_page #edit-topik-form').trigger("reset");
                    setTimeout(function(){
                        window.location.href = data.url;
                    }, 1000);
                }else{
                    $('#edit_topik_page .alert #ntf_success').html(data.notif.result);
                    $('#edit_topik_page .alert').show();
                }
            }
            $.each(data.notif,function(key,value){
                $('#ntf_' + key).html(value);
                $('#ntf_' + key).css({'color' : 'red', 'font-style' : 'italic'});
            });
            $('#edit_topik_page #loadingDiv').hide();
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
        });
    });


    // =======================================================     for handle set skill page input[type=checkbox] (employ module)
    $('body').on('click',' #employ-skill-page .form-group .checkbox-inline input[type=checkbox]',function() {
        
        $(this).parent().toggleClass('checked');
        var id_skill = $(this).val();
        $.ajax({
            beforeSend: function() {
                $('#employ-skill-page  #loadingDiv').show();
            },
            'url' : site_url + 'employ/skill',
            'method' : 'post',
            'dataType' : 'json',
            'data': { 'flag': 'skill', 'id_skill' : id_skill}
        }).done(function(data){
            console.log(data);
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
    });


    $('#employ-skill-page .form-group #kat-skill').change(function(){
        var idkat = $(this).val();
        $.ajax({
            beforeSend: function() {
                $('#employ-skill-page  #loadingDiv').show();
            },
            'url' : site_url + 'employ/skill',
            'method' : 'post',
            'dataType' : 'json',
            'data': { 'flag': 'kat_skill', 'id_kat_skill' : idkat}
        }).done(function(data){
            console.log(data);
            $('#skill-area').html(data);
        }).fail(function(xhr, status, error){
            alert(xhr.responseText + error);
            
        });
       
    });

    
    $("#trainer-propose-training-page #date").datepicker( "option", "dateFormat", "yy-mm-dd" );   

    // =======================================================      for handle page edit profile (trainer module)
    $("#trainer-edit-profile-page #tgl_lahir").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-dd-mm",
      yearRange: "-66:+0" 
    });
/*    // ==========================================================    for handle page propose training (trainer modeule)
    $('#trainer-propose-training-page #tgl_jadwal').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-dd-mm",
    yearRange: "+0:+4"
    });
    // =======================================================      for handle page edit profile (employ module)
    $("#employer-propose-job-page #tgl_jadwal").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-dd-mm",
    yearRange: "+0:+4"
    });

    //==========================================================    for handle page edit profile (employer module)
    $("#employer-edit-profile-page #tgl_lahir").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-dd-mm",
    yearRange: "-66:-17" 
    }); */


    // =======================================================      for handle job applied page (employ module)
    var table = $('#job-applied-employ-page #example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": { "url" : site_url + 'employ/myjob',
                  "type": "POST" 
        },
        "pagingType": "full",

        "order": [[ 4, "desc" ]]
    });


    $('#job-applied-employ-page #example tfoot th').each( function () {

        var title = $(this).text();
        var inp   = '<input type="text" class="form-control" placeholder="Search '+ title +'" />';
        if(title !== 'Action'){
            $(this).html(inp);
        }else{
             $(this).html("");
        }
        
    } );

    table.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });



    

    // =======================================================      for handle page edit profile (trainer module)
    $("#employ-edit-profile-page #tgl_lahir").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-dd-mm",
      yearRange: "-66:-17" 
    });

    var files;

// Add events
$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
}
$('form').on('change', uploadFiles);

// Catch the form submit and upload the files
function uploadFiles(event)
{
  event.stopPropagation(); // Stop stuff happening
    event.preventDefault(); // Totally stop stuff happening

    // START A LOADING SPINNER HERE

    // Create a formdata object and add the files
    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });

    $.ajax({
        url: site_url + 'employer/edit_profile',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                submitForm(event, data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}
     

});
