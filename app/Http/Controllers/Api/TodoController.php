namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('completed', 0)->get();
        return response()->json($todos);
    }

    public function indexComplete()
    {
        $todos = Todo::where('completed', 1)->get();
        return response()->json($todos);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            return response()->json($todo);
        }
        return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($data);

        return response()->json([
            'message' => 'Todo created successfully',
            'todo' => $todo,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo->update($data);

        return response()->json(['message' => 'Todo updated successfully']);
    }

    public function complete(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'completed' => 'required|boolean',
        ]);

        $todo->update($data);

        return response()->json(['message' => 'Todo updated successfully']);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return response()->json(['message' => 'Todo deleted successfully']);
        }
        return response()->json(['message' => 'Todo not found'], Response::HTTP_NOT_FOUND);
    }
}