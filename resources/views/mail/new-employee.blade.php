<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>New employee notification</title>

  <style>
    .prose {
      font-family: Arial, sans-serif;
      color: #333;
      line-height: 1.6;
    }

    .lg\:prose-xl h1 {
      font-size: 2em;
    }

    .lg\:prose-xl p {
      font-size: 1.125em;
    }

    a {
      display: inline-block;
      margin-top: 1em;
      padding: 0.5em 1em;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
    }

    article {
      border: 1px solid #b8b8b8;
      border-radius: 10px;
      padding: 1em;
    }

    /* article max w small */
    @media (min-width: 640px) {
      .prose {
        max-width: 32rem;
        margin-left: auto;
        margin-right: auto;
      }
    }

    /* article max w large */
    @media (min-width: 1024px) {
      .prose {
        max-width: 42rem;
      }
    }
  </style>
</head>

<body>
  <article class="prose lg:prose-xl">
    <h1>New employee</h1>
    <p>
      Dear {{ $employee->company->name }},<br>
      We are pleased to announce that a new employee has joined your company.
    </p>
    <p>
      <strong>First name:</strong> {{ $employee->first_name }}<br>
      <strong>Last name:</strong> {{ $employee->last_name }}<br>
      <strong>Email:</strong> {{ $employee->email }}<br>
      <strong>Phone:</strong> {{ $employee->phone }}<br>
    </p>

    <a href="{{ route('employees.show', [$employee->id]) }}">
      View employee details
    </a>
  </article>
</body>

</html>
