@extends('user.layout.main')
@section('content')

<style>
    .profile-container {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: inline-block;
        }

        .profile-picture {
            border-radius: 50%;
            margin-bottom: 20px;
            display: inline;
        }

        .profile-picture img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 2px solid #fff; /* Tambahkan border jika diinginkan */
        }

        .profile-info {
            color: #555;
        }
</style>

<label for="rating">Rating: </label>
<br>
<input type="number" id="rating" max="5" min="0">
<br><br>
<label for="komen">Comment: </label>
<br>
<textarea name="komen" id="komen" cols="100" rows="10">
</textarea>
<br>
<button id="submit">Submit</button>
<br><br>


<div class="fluid-container">
    <div class="row">
        <div class="col-8" id="cardContainer">
            <div class="card" id="cardContainerUser">
                <div class="card-body" id="userCard">
                    @if (!empty($review))
                        <div>
                            <div style="display: flex; justify-content: space-between">
                                <div class="profile-picture">
                                    <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg" alt="Profile Picture">
                                    <h5 class="card-title" style="display: inline; margin-right: 10px">{{$review['name']}}</h5> 
                                </div> 

                                <div style="margin-top: 6px">
                                    <h6 style="display: inline; z-index: 2;" id="ratingUser">{{$review['rating']}}</h6>
                                    <div class="profile-picture" style="margin-left: -6px; overflow: hidden;">
                                        <img src="https://image.freepik.com/vecteurs-libre/logo-banane_10250-3606.jpg" style=" width: 35px;height: 35px; overflow: hidden;" alt="Profile Picture">
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                        <p class="card-text" id="komenUser">{{$review['komen']}}</p>
                        <div style="display: flex; justify-content: space-between">
                            <p class="card-text"><small class="text-body-secondary" id="createdUser">{{$review['created']}}</small></p>
                            <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                            <input type="hidden" value="{{$review['id']}}" id="idReview">
                        </div>
                    @endif
                </div>
            </div>

            @foreach ($allReview as $r)
                @if (!($r == $review))
                <div class="card">  
                    <div class="card-body">
                        <div>
                            <div style="display: flex; justify-content: space-between">
                                <div class="profile-picture">
                                    <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg" alt="Profile Picture">
                                    <h5 class="card-title" style="display: inline; margin-right: 10px">{{$r['name']}}</h5> 
                                </div> 

                                <div style="margin-top: 6px">
                                    <h6 style="display: inline; z-index: 2;">{{$r['rating']}}</h6>
                                    <div class="profile-picture" style="margin-left: -6px; overflow: hidden;">
                                        <img src="https://image.freepik.com/vecteurs-libre/logo-banane_10250-3606.jpg" style=" width: 35px;height: 35px; overflow: hidden;" alt="Profile Picture">
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                        <p class="card-text">{{$r['komen']}}</p>
                        @if (session('role') == "admin")
                            <div style="display: flex; justify-content: space-between">
                                <p class="card-text"><small class="text-body-secondary" id="createdUser">{{$r['created']}}</small></p>
                                <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                                <input type="hidden" value="{{$r['id']}}" id="idReview">
                            </div>
                        
                        @else
                        <p class="card-text"><small class="text-body-secondary" id="createdReview">{{$r['created']}}</small></p>
                        @endif
                    </div>
                </div>
                @endif
                <br>
            @endforeach
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        var rating = 0;
        var komen = '';
        var filmId = '{{$film->id}}';
        var userId = '{{Auth::user()->id}}';
        var create = false;

        $(document).on('click', "#deleteButton", function(){
            var button = $(this);
            $.ajax({
                url: "{{route('user.deleteReview')}}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).siblings('#idReview').val(),
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: data['message'],
                        text: 'Komen anda telah berhasil di delete!',
                    })

                    button.closest('.card').remove();

                }
            });
        })

        if('{{empty($review)}}'){
           $("#cardContainerUser").hide(); 
        }else{
            $("#cardContainerUser").show();
        }

        $('#submit').click(function(){
            rating = $('#rating').val();
            komen = $('#komen').val();
            if(!'{{empty($review)}}' || create == true){

                if($("#rating").val() == 0 || $('#rating').val() == null){
                    console.log('kosong');
                    Swal.fire({
                        icon: 'error',
                        title: 'Rating belum diisi',
                        text: 'Mohon diisi terlebih dahulu, Terima kasih!',
                    })
                }
                else{
                    $.ajax({
                        url: "{{route('user.updateReview')}}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            filmId: filmId,
                            userId: userId,
                            rating: rating,
                            komen: komen,
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: 'Terima kasih atas reviewnya!',
                            })

                            $("#ratingUser").html(data['rating']);
                            $('#komenUser').html(data['komen']);
                            if (($('#komenUser').val() == "")) {
                                $('#komenUser').html("");
                            }
                            $("#createdReview").html(data['created']);
                        }

                    });
                }
            }
            else{
                if($("#rating").val() == 0 || $('#rating').val() == null){
                    console.log('kosong');
                    Swal.fire({
                        icon: 'error',
                        title: 'Rating belum diisi',
                        text: 'Mohon diisi terlebih dahulu, Terima kasih!',
                    })
                }
                else{
                    $.ajax({
                        url: "{{route('user.storeReview')}}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            filmId: filmId,
                            userId: userId,
                            rating: rating,
                            komen: komen,
                        },
                        dataType: 'json',
                        success: function (data) {
                            create = true;
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: 'Terima kasih atas reviewnya!',
                            })
                            console.log(data['rating']);
                            $("#cardContainerUser").show()
                            $("#cardContainerUser").css("margin-bottom", "25px");
                            $("#userCard").html(
                                "<div>"+
                                    "<div style='display: flex; justify-content: space-between'>"+
                                        "<div class='profile-picture'>"+
                                            "<img src='https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg' alt='Profile Picture'>"+
                                            "<h5 class='card-title' style='display: inline; margin-right: 10px'>" + (data['name']) + "</h5>"+
                                        "</div>"+ 

                                        "<div style='margin-top: 6px'>"+
                                            "<h6 style='display: inline;'>" + data['rating'] + "</h6>" +
                                            "<div class='profile-picture' style='margin-left: -2px; overflow: hidden;'>"+
                                                "<img src='https://image.freepik.com/vecteurs-libre/logo-banane_10250-3606.jpg' style='width: 35px; height: 35px; overflow: hidden;' alt='Profile Picture'>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                                "<p class='card-text'>" + (data['komen'] || "") + "</p>"+
                                "<div style='display: flex; justify-content: space-between'>" +
                                "<p class='card-text'><small class='text-body-secondary' id='createdReview'>" + (data['created']) + "</small></p>" +
                                "<button type='button' class='btn btn-danger' id='deleteButton'>Delete</button>" +
                                "<input type='hidden' value='" + (data['id']) + "' id='idReview'>" +
                                "</div>"
                                
                            );
                        }
                    });
                }
            }
        });
    });
</script>

@endsection