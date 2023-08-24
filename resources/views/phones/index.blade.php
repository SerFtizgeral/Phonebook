<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneBook</title>

    <style>
       body {
    font-family: Arial, sans-serif;
    background-image: url('images/herobg.png');
    background-size: cover; 
    margin: 0;
    padding: 0;
}
        
h1 {
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin: 0;
    font-size: 36px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    background-color: rgba(51, 51, 51, 0.5); 

}
           
        h2 {
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin: 0;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 2px solid #333;
            padding: 10px;
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: linear-gradient(to bottom, #333, #222);
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .search-container {
            text-align: center;
            margin: 20px auto;
            padding: 10px;
         
            border-radius: 3px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        .search-input:focus {
            border-color: #333;
        }

        .search-button {
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
      
        .search-button:hover {
            background-color: #555;
        }
        .sort-button {
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
      
        .sort-button:hover {
            background-color: #555;
        }
        .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a,
.pagination span {
    padding: 5px 10px;
    border: 1px solid #333;
    background-color: #fff;
    color: #333;
    text-decoration: none;
}

.pagination a:hover {
    background-color: #333;
    color: #fff;
}

.pagination .active a {
    background-color: #333;
    color: #fff;
}

      
    .inline-row {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px; /* Adjust the gap as needed */
    }

    .action-link,
    .action-form {
        display: inline;
       
    } 
    h1#add-contacts-title {
    margin-top: 30px;
}

.add-contacts-container {
    text-align: center;
   
}

.add-contacts-button {
    margin-left: 10px;
    padding: 5px 10px;
    background-color: #3F1560;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
}

.add-contacts-button:hover {
    background-color: #0056b3;
}
.sort-icon {
    font-size: 12px;
    margin-left: 5px;
}
.sort-icon.asc {
    transform: rotate(180deg);
}

    </style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.sort-icon').click(function() {
            var currentSort = $(this).hasClass('asc') ? 'asc' : 'desc';
            var newSort = currentSort === 'asc' ? 'desc' : 'asc';

            var sortOption = newSort === 'asc' ? 'a-z' : 'z-a';
            $('select[name="sort_option"]').val(sortOption);

            window.location.href = '{{ route("phone.index") }}?sort_option=' + sortOption;
        });
    });
</script>

<link href="{{ asset('path/to/pagination.css') }}" rel="stylesheet">



  
</head>
<body>
    <h1>PhoneBook</h1>

    <h2>Add Contacts</h2>
    <div class="add-contacts-container">
        <a href="{{ route('phone.create') }}">
            <button class="add-contacts-button">
                Add Contact
            </button>
        </a>
    </div>
   
    <form method="GET" action="{{ route('phone.index') }}">
        <div>
            <select name="sort_option">
              <option value="default">Default</option>
                <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z") { echo "selected"; } ?>> (Ascending Order)</option>    
                <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a") { echo "selected"; } ?>> (Descending Order)</option>
            </select>
            <button class="sort-button">Sort</button>
        </div>
    </form>

    <form method="get" action="{{ url('/search') }}">
        <div class="search-container">
            <input type="text" class="search-input" name="query" placeholder="Search...">
            <button class="search-button">Search</button>
        </div>
    </form>
    
    <div>
        <table border="2">
            <tr>
                <th>First name</th>
                <th>Last name <span class="sort-icon {{ $sortOption === 'a-z' ? 'asc' : '' }}">&#9650;&#9660;</span></th>

                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            @foreach ($phones as $phone)
                <tr>
                    <td>{{ $phone->fname }}</td>
                    <td>{{ $phone->lname }}</td>
                    <td>{{ $phone->address }}</td>
                    <td>{{ $phone->contact }}</td>
                    <td>{{ $phone->mmail }}</td>
             <td>
                    <a href="{{ route('phone.edit', ['phone' => $phone]) }}" class="action-link">
                    <img src="{{ asset('images/eds.png') }}" alt="Edit">
                 </a>
                 <form method="post" action="{{ route('phone.delete', ['phone' => $phone]) }}" class="action-form" onsubmit="return confirm('Are you sure you want to delete this record?')">
                  @csrf
                 @method('delete')
                 <button type="submit">
                 <img src="{{ asset('images/del.png') }}" alt="Delete">
        </button>
                   </form>
            </td>

                </tr>
            @endforeach
        </table>
    </div>

   
    <div class="pagination-container">
    {{ $phones->appends(['sort_option' => $sortOption, 'query' => request('query')])->links('pagination::simple-default') }}

    </div>
</body>
</html>
