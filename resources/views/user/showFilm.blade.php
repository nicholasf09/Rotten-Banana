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

        #logoPisang {
        width: 30px;
        height: 30px;
        object-fit: cover;
        display: inline
    }

</style>
<h5>Like: </h5>
<h6 id="totalLike">{{$film->like}}</h6> 
<h5>Rata-rata Rating: </h5>
<h6 id="rata2">{{ $jumlahReview == 0 ? 0 : $totalRating / $jumlahReview }}</h6>
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

@if ($like)
    <input type="radio" class="btn-check" name="btnradio" id="likeButton" autocomplete="off" checked>
    <label class="btn btn-outline-primary" for="likeButton" >Like</label>
@else
    <input type="radio" class="btn-check" name="btnradio" id="likeButton" autocomplete="off">
    <label class="btn btn-outline-primary" for="likeButton" >Like</label>
@endif

<br><br>


<div class="fluid-container">
    <div class="row">
        <div class="col-8" id="cardContainer">
            <div class="card" id="cardContainerUser">
                <div class="card-body" id="userCard">
                    @if (!empty($review))
                        <div id="tambahanAjax">
                            <div style="display: flex; justify-content: space-between">
                                <div class="profile-picture">
                                    <img src="https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg" alt="Profile Picture">
                                    <h5 class="card-title" style="display: inline; margin-right: 10px">{{$review['name']}}</h5> 
                                </div> 

                                <div style="margin-top: 6px">
                                    <h6 style="display: inline; z-index: 2;" id="ratingUser">{{$review['rating']}}</h6>
                                    <div class="profile-picture" style="margin-left: -6px; overflow: hidden;">
                                        <img id="logoPisang" src="{{ $review['rating'] <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($review['rating'] <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}" alt="">
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
                                        <img id="logoPisang" src="{{ $r['rating'] <= 2 ? asset('storage/uploads/assets/pisang_busuk.png') : ($r['rating'] <= 4 ? asset('storage/uploads/assets/pisang_hijau.png') : asset('storage/uploads/assets/pisang_kuning.png')) }}" alt="">
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
        var create = "{{!empty($review)}}";
        var newElement = "{{!empty($review)}}";
        var ratingUser = 0;
        if($("#ratingUser").text() != ""){
            ratingUser = parseInt($("#ratingUser").text());
        }
        var totalRating = parseInt("{{$totalRating}}");
        var jumlahReview = parseInt("{{$jumlahReview}}");
        var rata2 = totalRating / jumlahReview;
        if(jumlahReview == 0){
            rata2 = 0;
        }
        var likeAtoGak = "{{$like}}";


        $(document).on('click', "#likeButton", function () {

            

            if (likeAtoGak) {
                Swal.fire({
                    title: 'Apakah anda yakin ngeunlike film ini?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{env('LINK_WEBSITE')}}user/unlike/{{$film->id}}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: "{{$film->id}}",
                            },
                            dataType: 'json',
                            success: function (data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    text: 'Terima kasih atas partisipasinya!',
                                })
                                likeAtoGak = false;
                                $("#totalLike").text(data['like']);
                                $("#likeButton").prop('checked', false); 
                            }
                        });
                    } else if (result.isDenied) {
                        likeAtoGak = true;
                        Swal.fire('Anda tidak jadi ngeunlike film ini!', '', 'info')
                        $("#likeButton").prop('checked', true);
                    }
                });
            } else {
                Swal.fire({
                    title: 'Apakah yakin mau ngelike film ini?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{env('LINK_WEBSITE')}}user/like/{{$film->id}}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: "{{$film->id}}",
                            },
                            dataType: 'json',
                            success: function (data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    text: 'Terima kasih atas like nya!',
                                })
                                $("#likeButton").attr('checked', true);
                                likeAtoGak = true;
                                $("#totalLike").text(data['like']);
                            }
                        });
                    } else if (result.isDenied) {
                        likeAtoGak = false;
                        Swal.fire('Anda tidak jadi ngelike film ini!', '', 'info')
                        $("#likeButton").prop('checked', false); 
                    }
                });
            }

            
        })

        $(document).on('click', "#deleteButton", function(){
            var button = $(this);
            Swal.fire({
                title: 'Apakah yakin mau mendelete komen ini?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{route('user.deleteReview')}}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: $(this).siblings('#idReview').val(),
                            },
                            dataType: 'json',
                            success: function (data) {
                                newElement = null;
                                totalRating = parseInt(totalRating) - parseInt(ratingUser);
                                jumlahReview = parseInt(jumlahReview) - 1;
                                rata2 = totalRating / jumlahReview;
                                if (jumlahReview == 0) {
                                    rata2 = 0;
                                }
                                
                                $("#rata2").text(rata2);
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    text: 'Komen anda telah berhasil di delete!',
                                })
                                create = false;
                                button.closest('#tambahanAjax').remove();
                                $("#cardContainerUser").hide();
                            }
                        });
                    } 
                    else if (result.isDenied) {
                        Swal.fire('Komen anda tidak jadi di delete!', '', 'info')
                    }
                })
        })

        if(!create){
           $("#cardContainerUser").hide(); 
        }else{
            $("#cardContainerUser").show();
        }

        $('#submit').click(function(){
            rating = $('#rating').val();
            komen = $('#komen').val();
            if(create == true){

                if($("#rating").val() == 0 || $('#rating').val() == null){
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
                            $("input").val("");
                            $("textarea").val("");
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: 'Terima kasih atas reviewnya!',
                            })
                            
                            totalRating = parseInt(totalRating) - parseInt(ratingUser) + parseInt(data['rating']);
                            jumlahReview = parseInt(jumlahReview);
                            console.log(jumlahReview);
                            rata2 = totalRating / jumlahReview;
                            ratingUser = parseInt(data['rating']);
                            $("#rata2").text(rata2);
                            $("#ratingUser").text(data['rating']);
                            if (newElement == null) {
                                $("#ratingUser").text(data['rating']);
                                $('#komenUser').text(data['komen']);
                                if (($('#komenUser').val() == "")) {
                                    $('#komenUser').html("");
                                }
                                $("#createdReview").html(data['created']);
                                var srcImage = "";

                                if(data['rating'] <= 2){
                                    srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
                                }
                                else if(data['rating'] <= 4){
                                    srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
                                }
                                else{
                                    srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";
                                }

                                $("#logoPisang").attr('src', srcImage);

                            }else{
                                

                                var srcImage = "";

                                if(data['rating'] <= 2){
                                    srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
                                }
                                else if(data['rating'] <= 4){
                                    srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
                                }
                                else{
                                    srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";

                                }

                                newElement = $(
                                    "<div id='tambahanAjax'>"+
                                        "<div style='display: flex; justify-content: space-between'>"+
                                            "<div class='profile-picture'>"+
                                                "<img src='https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg' alt='Profile Picture'>"+
                                                "<h5 class='card-title' style='display: inline; margin-right: 10px'>" + (data['name']) + "</h5>"+
                                            "</div>"+ 

                                            "<div style='margin-top: 6px'>"+
                                                "<h6 style='display: inline;'>" + data['rating'] + "</h6>" +
                                                "<div class='profile-picture' style='margin-left: -2px; overflow: hidden;'>"+
                                                    "<img src="+srcImage+" style='width: 35px; height: 35px; overflow: hidden;' alt='Profile Picture'>"+
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
                                $("#userCard").html(newElement);
                            }
                        }

                    });
                }
            }
            else{
                if($("#rating").val() == 0 || $('#rating').val() == null){
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
                            ratingUser = parseInt(data['rating']);
                            create = true;
                            Swal.fire({
                                icon: 'success',
                                title: data['message'],
                                text: 'Terima kasih atas reviewnya!',
                            })
                            totalRating = parseInt(totalRating) + parseInt(data['rating']);
                            jumlahReview = parseInt(jumlahReview) + 1;
                            rata2 = totalRating / jumlahReview;
                            $("#rata2").text(rata2);
                            var srcImage = "";

                            if(data['rating'] <= 2){
                                srcImage = "{{asset('storage/uploads/assets/pisang_busuk.png')}}";
                            }
                            else if(data['rating'] <= 4){
                                srcImage = "{{asset('storage/uploads/assets/pisang_hijau.png')}}";
                            }
                            else{
                                srcImage = "{{asset('storage/uploads/assets/pisang_kuning.png')}}";

                            }

                            $("input").val("");
                            $("textarea").val("");
                            $("#cardContainerUser").show()
                            $("#cardContainerUser").css("margin-bottom", "25px");
                            newElement = $(
                                "<div>"+
                                    "<div style='display: flex; justify-content: space-between'>"+
                                        "<div class='profile-picture'>"+
                                            "<img src='https://www.murrayglass.com/wp-content/uploads/2020/10/avatar-2048x2048.jpeg' alt='Profile Picture'>"+
                                            "<h5 class='card-title' style='display: inline; margin-right: 10px'>" + (data['name']) + "</h5>"+
                                        "</div>"+ 

                                        "<div style='margin-top: 6px'>"+
                                            "<h6 style='display: inline;'>" + data['rating'] + "</h6>" +
                                            "<div class='profile-picture' style='margin-left: -2px; overflow: hidden;'>"+
                                                "<img src="+srcImage+" style='width: 35px; height: 35px; overflow: hidden;' alt='Profile Picture'>"+
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

                            $("#userCard").html(newElement);
                        }
                    });
                }
            }
        });
    });
</script>

@endsection