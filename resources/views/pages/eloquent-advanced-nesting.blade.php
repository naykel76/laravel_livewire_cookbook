<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="Advanced Nesting" class="py-5-3-2">
    <div class="container-xxl">
        <h1 class="title mb-3">Eloquent: Advanced Nesting and Optimisation</h1>
        <div class="flex gap va-t">
            <div class="fg1">
                <!-- course and student course -->
                <div class="bx  flex gap-2">
                    <!-- student course details -->
                    <div>
                        <div class="fw7 txt-blue">Student Course Details</div>
                        <div><strong>Student Course ID: </strong>{{ $studentCourse->id }}</div>
                        <div><strong>Started: </strong>{{ $studentCourse->started_at->diffForHumans() }}</div>
                        <div><strong>Completed: </strong>{{ $studentCourse->completed_at }}</div>
                        <div><strong>Expired: </strong>{{ $studentCourse->expired_at }}</div>
                    </div>
                    <!-- course details -->
                    <div>
                        <div class="fw7 txt-blue">Course Details</div>
                        <div><strong>Course ID: </strong>{{ $studentCourse->course->id }}</div>
                        <div><strong>Course Title: </strong>{{ $studentCourse->course->title }}</div>
                        <div><strong>Course Code: </strong>{{ $studentCourse->course->code }}</div>
                    </div>
                </div>
                <!-- module, lesson and student lessons -->
                <div class="grid cols-3 gap va-t txt-sm">
                    @foreach ($groupedStudentLessons as $module => $studentLessons)
                        <div>
                            <!-- module details -->
                            <div class="bx dark pxy-05">
                                <div class="fw7 txt-blue">{{ Str::limit($studentLessons->first()->lesson->module->title, 35) }}</div>
                                <div><strong>Module ID: </strong>{{ $module }}</div>
                            </div>
                            @foreach ($studentLessons as $sl)
                                <div class="bx pxy-05">
                                    <!-- student lesson details -->
                                    <div>
                                        <div class="fw7 txt-blue">Student Lesson Details</div>
                                        <div><strong>Student Lesson ID: </strong>{{ $sl->id }}</div>
                                        <div><strong>Completed: </strong>{{ $sl->completed_at }}</div>
                                        <div><strong>Student Course ID: </strong>{{ $sl->student_course_id }}</div>
                                    </div>
                                    <!-- lesson details -->
                                    <div>
                                        <div class="fw7 txt-blue">Lesson Details</div>
                                        <div><strong>Lesson ID: </strong>{{ $sl->lesson->id }}</div>
                                        <div><strong>Lesson: </strong>{{ Str::limit($sl->lesson->title, 12) }}</div>
                                        <div><strong>Lesson Module ID: </strong>{{ $sl->lesson->module_id }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="maxw-sm space-y fg1">
                <ul>
                    <li>Make sure you include the necessary relationships id's when eager loading.</li>
                </ul>
                {{-- blade-formatter-disable --}}
                {{-- <x-markdown class="-ml-11">
                    @verbatim
                        ```php
 
                    @endverbatim
                </x-markdown> --}}
                {{-- blade-formatter-enable --}}
            </div>
        </div>
    </div>
</x-gt-app-layout>
