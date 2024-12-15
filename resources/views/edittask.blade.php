<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Form container */
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Your Task</h1>
        <form action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <!-- Title Field -->
            <label for="title">Task Title</label>
            <input type="text" id="title" name="title" placeholder="Enter task title" value="{{ old('title', $task->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
    
            <!-- Description Field -->
            <label for="description">Short Description</label>
            <input type="text" id="description" name="description" placeholder="Enter short description" value="{{ old('description', $task->description) }}">
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
    
            <!-- Long Description Field -->
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description" placeholder="Enter detailed description">{{ old('long_description', $task->long_description) }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
    
            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Update Task</button>
        </form>
    </div>
    
</body>
</html>
