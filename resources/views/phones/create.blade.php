<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contacts</title>
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
            width: 95%;
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
            form {
        background: #fff;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc; /* Add this line to add a border */
        }
        .input-container {
            border: 1px solid #ccc; /* Add this line to add a border */
            padding: 10px;
            border-radius: 3px;
        }
        .error-container {
        max-width: 200px;
        margin: 0 auto;
        text-align: center;
        padding: 10px;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        color: #721c24;
       }

        .error-container ul {
            list-style: none;
            padding-left: 0;
        }

        .error-container li {
            margin-bottom: 5px;
        }

    </style>
</head>



<body>


    <h1>Add Contacts</h1>


    <form method="post" action="{{ route('phone.store') }}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div>
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" placeholder="First Name" />
        @if ($errors->has('fname'))
            <p class="error">{{ $errors->first('fname') }}</p>
        @endif
    </div>

    <div>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" placeholder="Last Name" />
        @if ($errors->has('lname'))
            <p class="error">{{ $errors->first('lname') }}</p>
        @endif
    </div>

    <div>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Address" />
        @if ($errors->has('address'))
            <p class="error">{{ $errors->first('address') }}</p>
        @endif
    </div>

    <div>
        <label for="contact">Contact Number</label>
        <input type="text" name="contact" id="contact" placeholder="Contact Number" />
        @if ($errors->has('contact'))
            <p class="error">{{ $errors->first('contact') }}</p>
        @endif
    </div>

    <div>
        <label for="mmail">Email</label>
        <input type="text" name="mmail" id="mmail" placeholder="Email" />
        @if ($errors->has('mmail'))
            <p class="error">{{ $errors->first('mmail') }}</p>
        @endif
    </div>

    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*">
        @if ($errors->has('image'))
            <p class="error">{{ $errors->first('image') }}</p>
        @endif
    </div>

   

    <div>
        <input type="submit" value="Save Contact Person" />
    </div>
</form>
<div id="alertContainer" style="text-align: center; margin-top: 10px;"></div>



<style>
    .error {
        color: red;
        font-size: 12px;
    }
</style>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('phone.index') }}" style="text-decoration: none;">
            <button style="padding: 10px 20px; background-color: #333; color: #fff; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">
                Go to Contacts List
            </button>
        </a>
    </div>
</body>
</html>
