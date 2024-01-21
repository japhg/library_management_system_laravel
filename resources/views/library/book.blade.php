<!DOCTYPE html>
<html lang="en">

<head>
    @include('library.components.header')
    <title>List of Books</title>
</head>

<body class="fix-header fix-sidebar card-no-border">
    @include('library.components.navbar')
    @include('library.components.sidebar')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "{{ $error }}",
                })
            </script>
        @endforeach
    @endif
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
            })
        </script>
    @endif

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('library.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">List of Books</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addBookModal">Add Book</button>
                                </div>
                                <hr>
                                <div class="title text-center mb-3">
                                    <h4 class="fs-4">LIST OF BOOKS</h4>
                                </div>
                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Book Title</th>
                                                <th>Author</th>
                                                <th>Publisher</th>
                                                <th>Published Year</th>
                                                <th>Genre</th>
                                                <th>Number of Pages</th>
                                                <th>Quantity Available</th>
                                                <th>Location</th>
                                                <th>Condition</th>
                                                <th>Date Acquired</th>
                                                <th>Availability Status</th>
                                                <th>Edition</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $book->id }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->author }}</td>
                                                    <td>{{ $book->publisher }}</td>
                                                    <td>{{ $book->publication_year }}</td>
                                                    <td>{{ $book->genre }}</td>
                                                    <td>{{ $book->number_of_pages }}</td>
                                                    <td>{{ $book->quantity_available }}</td>
                                                    <td>{{ $book->location }}</td>
                                                    <td>{{ $book->condition }}</td>
                                                    <td>{{ $book->date_acquired }}</td>
                                                    <td>{{ $book->availability_status }}</td>
                                                    <td>{{ $book->edition }}</td>
                                                    <td>
                                                        <div class="contain">
                                                            <div class="column">
                                                                <button type="button" class="btn btn-success btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editBookModal-{{ $book->id }}">Edit</button>
                                                            </div>
                                                            <div class="column">
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="showDeleteConfirmation('{{ $book->id }}')">Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    {{-- Modal for Updating Books --}}
                                                    <div class="modal fade" id="editBookModal-{{ $book->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">
                                                                        <form
                                                                            action="{{ route('library.updateBook', ['book' => $book->id]) }}"
                                                                            method="POST" class="form-group">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Book
                                                                                    Title</label>
                                                                                <input type="text" name="title"
                                                                                    class="form-control"
                                                                                    value="{{ $book->title }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Book
                                                                                    Author</label>
                                                                                <input type="text" name="author"
                                                                                    class="form-control"
                                                                                    value="{{ $book->author }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">ISBN
                                                                                    (International
                                                                                    Standard Book Number)</label>
                                                                                <input type="text" name="isbn"
                                                                                    class="form-control"
                                                                                    value="{{ $book->isbn }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Publisher</label>
                                                                                <input type="text" name="publisher"
                                                                                    class="form-control"
                                                                                    value="{{ $book->publisher }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Publication
                                                                                    Year</label>
                                                                                <input type="date"
                                                                                    name="publication_year"
                                                                                    value="{{ $book->publication_year }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Genre</label>
                                                                                <select name="genre" id="genre"
                                                                                    class="form-select" required>
                                                                                    <option value="{{ $book->genre }}"
                                                                                        selected>{{ $book->genre }}
                                                                                    </option>
                                                                                    @foreach ($book_genres as $book_genre)
                                                                                        <option
                                                                                            value="{{ $book_genre->name }}">
                                                                                            {{ $book_genre->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Description</label>
                                                                                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $book->description }}</textarea>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Language</label>
                                                                                <input type="text" name="language"
                                                                                    class="form-control"
                                                                                    value="{{ $book->language }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Number of
                                                                                    Pages</label>
                                                                                <input type="text"
                                                                                    name="number_of_pages"
                                                                                    class="form-control"
                                                                                    value="{{ $book->number_of_pages }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Quantity
                                                                                    Available</label>
                                                                                <input type="number"
                                                                                    name="quantity_available"
                                                                                    class="form-control"
                                                                                    value="{{ $book->quantity_available }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Location</label>
                                                                                <input type="text" name="location"
                                                                                    class="form-control"
                                                                                    value="{{ $book->location }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Condition</label>
                                                                                <input type="text" name="condition"
                                                                                    class="form-control"
                                                                                    value="{{ $book->condition }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Date
                                                                                    Acquired</label>
                                                                                <input type="date"
                                                                                    name="date_acquired"
                                                                                    class="form-control"
                                                                                    value="{{ $book->date_acquired }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Keywords</label>
                                                                                <input type="text" name="keywords"
                                                                                    class="form-control"
                                                                                    value="{{ $book->keywords }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Ratings</label>
                                                                                <input type="text" name="ratings"
                                                                                    value="{{ $book->ratings }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Availability
                                                                                    Status</label>
                                                                                <select name="availability_status"
                                                                                    id="availability_status"
                                                                                    class="form-select" required>
                                                                                    <option
                                                                                        value="{{ $book->availability_status }}"
                                                                                        selected readonly>
                                                                                        {{ $book->availability_status }}
                                                                                    </option>
                                                                                    <option value="Available">Available
                                                                                    </option>
                                                                                    <option value="Borrowed">Borrowed
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Additional
                                                                                    Notes</label>
                                                                                <textarea name="additional_notes" id="additional_notes" cols="30" rows="5" class="form-control">{{ $book->additional_notes }}</textarea>
                                                                            </div>
                                                                            <div class="col-md-12 mt-3">
                                                                                <label for=""
                                                                                    class="form-label">Edition</label>
                                                                                <select name="edition" id="edition"
                                                                                    class="form-select" required>
                                                                                    <option
                                                                                        value="{{ $book->edition }}"
                                                                                        selected readonly>
                                                                                        {{ $book->edition }}
                                                                                    </option>
                                                                                    <option value="First Edition">First
                                                                                        Edition</option>
                                                                                    <option value="Second Edition">
                                                                                        Second Edition</option>
                                                                                    <option value="Third Edition">Third
                                                                                        Edition</option>
                                                                                    <option value="Fourth Edition">
                                                                                        Fourth Edition</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer mt-4">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    name="update_book_btn"
                                                                                    class="btn btn-primary">Update</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End of Modal for Updating Books --}}

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Modal for Adding Books --}}
                                <div class="modal fade" id="addBookModal" tabindex="-1"
                                    aria-labelledby="addBookModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <form action="{{ route('library.addBook') }}" method="POST"
                                                        class="form-group">
                                                        @csrf
                                                        @method('POST')
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Book
                                                                Title</label>
                                                            <input type="text" name="title" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Book
                                                                Author</label>
                                                            <input type="text" name="author" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">ISBN
                                                                (International
                                                                Standard Book Number)</label>
                                                            <input type="text" name="isbn" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Publisher</label>
                                                            <input type="text" name="publisher"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Publication
                                                                Year</label>
                                                            <input type="date" name="publication_year"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Genre</label>
                                                            <select name="genre" id="genre" class="form-select"
                                                                required>
                                                                <option value="" selected disabled>Select
                                                                </option>
                                                                @foreach ($book_genres as $book_genre)
                                                                    <option value="{{ $book_genre->name }}">
                                                                        {{ $book_genre->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for=""
                                                                class="form-label">Description</label>
                                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Language</label>
                                                            <input type="text" name="language"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Number of
                                                                Pages</label>
                                                            <input type="number" name="number_of_pages"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Quantity
                                                                Available</label>
                                                            <input type="number" name="quantity_available"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Location</label>
                                                            <input type="text" name="location"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Condition</label>
                                                            <input type="text" name="condition"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Date
                                                                Acquired</label>
                                                            <input type="date" name="date_acquired"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Keywords</label>
                                                            <input type="text" name="keywords"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Ratings</label>
                                                            <input type="text" name="ratings" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Availability
                                                                Status</label>
                                                            <select name="availability_status"
                                                                id="availability_status" class="form-select" required>
                                                                <option value="" selected disabled>Select
                                                                </option>
                                                                <option value="Available">Available</option>
                                                                <option value="Borrowed">Borrowed</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Additional
                                                                Notes</label>
                                                            <textarea name="additional_notes" id="additional_notes" cols="30" rows="5" class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label for="" class="form-label">Edition</label>
                                                            <select name="edition" id="edition" class="form-select"
                                                                required>
                                                                <option value="" selected disabled>Select
                                                                </option>
                                                                <option value="First Edition">First Edition</option>
                                                                <option value="Second Edition">Second Edition</option>
                                                                <option value="Third Edition">Third Edition</option>
                                                                <option value="Fourth Edition">Fourth Edition</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="add_book_btn"
                                                                class="btn btn-primary">Add</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                {{-- End of Modal for Adding Books --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>

    </script>
    @include('library.components.footer')
</body>

</html>
