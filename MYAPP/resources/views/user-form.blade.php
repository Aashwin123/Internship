<div>
<form action="adduser"method="post" enctype="multipart/form-data">
    @csrf
<div class="input-wrapper">
    <input type="text" value="{{ old('username') }}" placeholder="Enter User Name" name="username">
    <span style="color:red">@error('username'){{ $message }}@enderror</span>
</div>
<div class="input-wrapper">
    <input type="text" value="{{ old('Email') }}" placeholder="Enter User Email" name="Email">
    <span style="color:red">@error('Email'){{ $message }}
    @enderror</span>
</div>
<div class="input-wrapper">
    <input type="text" value="{{ old('city') }}" placeholder="Enter User City" name="city">
    <span style="color:red">@error('city'){{ $message }}
    @enderror

    </span>
</div>
<div class="input-wrapper">
        <label for="user_image">Profile Image:</label>
        <input type="file" value="{{ old('user_image') }}" name="user_image" id="user_image">
        <span style="color:red">@error('user_image'){{ $message }}@enderror</span>
    </div>
<div class="input-wrapper">
    <button>Add new User</button>
</div>
</form>
@if(isset($imagePath))
<div class="input-wrapper" value="{" style="margin-top: 20px;">
    <h3>Your Uploaded Image:</h3>
    <img src="{{ asset('storage/' . $imagePath) }}" width="200" style="border: 2px solid green;">
</div>
@endif
</div>
<style>
    input{
        border: green 1px solid;
        height: 35px;
        width: 200px;
        border-radius: 2px;
        color:Red;
    }
    .input-wrapper{
        margin:10px;
    }
    button{
        border: green 1px solid;
        height: 35px;
        width: 200px;
        border-radius: 2px;
        color:Red;
    }
</style>