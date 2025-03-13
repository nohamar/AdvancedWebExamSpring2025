@extends(layouts.app)

@section('title', 'Courses Page')

@section('content')


<h1>Add a course:</h1>
@csrf
<form class="max-w-sm mx-auto" id="addcoursesform">
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Name</label>
    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  
  <div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Description</label>
    <input type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
   
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

<div class="courses">

<div>
    <div></div>
    <a href="" ><button id="deleteCourse">Delete</button></a>
</div>
</div>

<script>

    $(document).on("submit", "#addcoursesform", function (e) {
        e.preventDefault();
        
        $.ajax({
            url: "{{ route('courses.store') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                alert(response.message);
                $("#addcoursesform")[0].reset();
            },
            error: function (xhr) {
                alert("Error: " + xhr.responseText);
            }
        });
    });

    function deleteCourse(id) {
        $.ajax({
            url: /courses/${id},
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                alert(response.message);
            },
            error: function (xhr) {
                alert("Error: " + xhr.responseText);
            }
        });
    }

    $(document).on("click", "#deleteCourse", function () {
        let id = $("#deleteRecipeId").val();
        deleteCourse(id);
    });
</script>
@endsection