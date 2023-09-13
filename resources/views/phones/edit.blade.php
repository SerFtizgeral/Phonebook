<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #6c3483, #472e59); 
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        form {
            background: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="address"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<h1>Update Contacts</h1>

<form method="post" action="{{ route('phone.update', ['phone' => $phone]) }}" enctype="multipart/form-data">
    @csrf
    @csrf
    @method('put')
    <div>
    <label for="fname">First Name</label>
    <input type="text" name="fname" id="fname" placeholder="First Name" value="{{$phone->fname}}" />
    @error('fname')
    <span class="error">{{ $message }}</span>
    @enderror
</div>


<div>
    <label for="lname">Last Name</label>
    <input type="text" name="lname" id="lname" placeholder="Last Name" value="{{$phone->lname}}" />
    @error('lname')
    <span class="error">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" placeholder="Address" value="{{$phone->address}}" />
    @error('address')
    <span class="error">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="contact">Contact Number</label>
    <input type="text" name="contact" id="contact" placeholder="Contact Number" value="{{$phone->contact}}" />
    @error('contact')
    <span class="error">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="mmail">Email</label>
    <input type="text" name="mmail" id="mmail" placeholder="Email" value="{{$phone->mmail}}" />
    @error('mmail')
    <span class="error">{{ $message }}</span>
    @enderror
</div>
<div>
    <label for="image">Image</label>
    <input type="file" name="image" id="image" accept="image/*">
    @if ($errors->has('image'))
        <p class="error">{{ $errors->first('image') }}</p>
    @endif
    @if ($phone->image_path)
        <p>Current Image:</p>
        <img src="{{ asset('storage/images' . $phone->image_path) }}" alt="Current Image" style="max-width: 300px;">
    @else
        <p>No current image available.</p>
    @endif
</div>





<style>
    .error {
        color: red;
        font-size: 12px;
    }
</style>




    <div>
        <input type="submit" value="Update Contact Person" />
    </div>
</form>



<div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('phone.index') }}" style="text-decoration: none;">
        <button style="padding: 10px 20px; background-color: #333; color: #fff; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">
            Go to Contacts List
        </button>
    </a>
</div>
    
</body>
</html>
