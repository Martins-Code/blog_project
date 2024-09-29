<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        /* Your existing styles */
        body {
            background-color: #1a1a2e;
            font-family: Arial, sans-serif;
            color: #ddd;
        }
        .post_title {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border-bottom: 2px solid #444;
        }
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 0.08);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }
        .form-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #ccc;
        }
        .form-container input[type="text"],
        .form-container textarea,
        .form-container input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #555;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            font-size: 16px;
            color: #ddd;
        }
        .form-container textarea {
            height: 120px;
            resize: none;
        }
        .form-container input[type="file"] {
            border: none;
            padding: 8px 0;
        }
        .form-container button {
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            .post_title {
                font-size: 28px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation -->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end -->

        <div class="page-content">
            <h1 class="post_title">Add Post</h1>

            @if (session('success'))
                <div style="color: green; text-align: center; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-container">
                <form action="{{url('add_post')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span style="color: red;">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="desc">Post Description</label>
                        <textarea name="desc" id="desc">{{ old('desc') }}</textarea>
                        @if ($errors->has('desc'))
                            <span style="color: red;">{{ $errors->first('desc') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="image">Add Image</label>
                        <input type="file" name="image" id="image">
                        @if ($errors->has('image'))
                            <span style="color: red;">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        @include('admin.footer')
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('submit-btn').disabled = true;
        });
    </script>
</body>
</html>
