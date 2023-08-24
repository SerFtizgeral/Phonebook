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
    <h1>Add Contacts</h1>
   
    <form method="post" action="{{route('phone.update', ['phone'=> $phone])}}">
        @csrf
        @method('put')
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" value="{{$phone->fname}}" />
            <input type="text" name="lname" placeholder="Last Name" value="{{$phone->lname}}" />
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Address" value="{{$phone->address}}" />
        </div>

        <div>
            <label for="contact">Contact Number</label>
            <input type="text" name="contact" id="contact" placeholder="Contact Number"value="{{$phone->contact}}"  />
        </div>

        <div>
            <label for="mmail">Email</label>
            <input type="text" name="mmail" id="mmail" placeholder="Email" value="{{$phone->mmail}}" />
        </div>
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
