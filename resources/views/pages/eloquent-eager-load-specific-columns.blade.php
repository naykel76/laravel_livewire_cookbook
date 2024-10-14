<x-gt-app-layout layout="{{ config('naykel.template') }}" :$pageTitle class="py-5-3-2">
    <div class="container-xl">
        <h1 class="title mb-3">Optimizing Eloquent Queries: Eager Loading Specific Columns</h1>
        <div class="flex gap va-t">
            <div class="bx">
                @foreach ($courses as $course)
                    <div class="txt-blue">
                        {{ $course->title }}
                    </div>
                    @foreach ($course->modules as $module)
                        <div class="ml-1 txt-orange">
                            <span class="txt-blue">CID: {{ $module->course_id }}</span> {{ Str::limit($module->title, 50) }}
                        </div>
                        @foreach ($module->lessons as $lesson)
                            <div class="ml-2 txt-green">
                                <span class="txt-orange">MID: {{ $lesson->module_id }}</span> {{ Str::limit($lesson->title, 45) }}
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
            <!-- code block -->
            <div class="maxw-sm space-y">
                <ul>
                    <li>
                        Make sure you include the <code>id</code> in the <code>select</code>
                        method. This is because Eloquent needs the <code>id</code> to match the
                        related records.
                    </li>
                    <li>
                        Avoid using arrow functions in this context, as they won't work as expected.
                        Arrow functions automatically inherit variables from the parent scope, but
                        they cannot handle nested relationship loading as required here.
                    </li>
                </ul>
                {{-- blade-formatter-disable --}}
                <x-markdown class="-ml-11">
                    @verbatim
                        ```php
                        $courses = Course::select('id', 'title', 'slug')
                            ->with([
                                'modules:id,course_id,title',
                                'modules.lessons:id,module_id,title'
                            ])->get();
                    @endverbatim
                </x-markdown>
                <p>Here is the query code using the traditional closures:</p>
                <x-markdown class="-ml-11">
                    @verbatim
                        ```php
                        $courses = Course::select('id', 'title', 'slug')
                            ->with([
                                'modules' => function ($query) {
                                    $query->select('id', 'course_id', 'title');
                                },
                                'modules.lessons' => function ($query) {
                                    $query->select('id', 'module_id', 'title');
                                }
                            ])->get();
                    @endverbatim
                </x-markdown>
                {{-- blade-formatter-enable --}}
                <x-markdown class="-ml-11">
                    @verbatim
                        ```
                        @foreach ($courses as $course)
                            {{ $course->title }}
                            @foreach ($course->modules as $module)
                                {{ $module->title }}
                                @foreach ($module->lessons as $lesson)
                                    {{ $lesson->title }}
                                @endforeach
                            @endforeach
                        @endforeach
                    @endverbatim
                </x-markdown>
            </div>
        </div>
    </div>
</x-gt-app-layout>
