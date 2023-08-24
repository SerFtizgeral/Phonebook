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

    @if ($errors->any())
<div class="error-container">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

   
    <form method="post" action="{{ route('phone.store') }}">
        @csrf
        @method('post')
        <div>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" />
            <input type="text" name="lname" placeholder="Last Name" />
        </div>

        <div>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Address" />
        </div>

        <div>
            <label for="contact">Contact Number</label>
            <input type="text" name="contact" id="contact" placeholder="Contact Number" />
        </div>

        <div>
            <label for="mmail">Email</label>
            <input type="text" name="mmail" id="mmail" placeholder="Email" />
        </div>
        <div>
            <input type="submit" value="Save Contact Person" />
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
