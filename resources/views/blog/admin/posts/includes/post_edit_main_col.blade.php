@php
    /** @var \App\Models\BlogPost $item */
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>

            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle md-2 text-muted"></div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toffle="tab" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link " data-toffle="tab" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>

                <div class="tab-content">
                    <div class="tab-pane active" id="#maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>

                            <input type="text"
                                   name="title"
                                   value="{{ $item->title }}"
                                   id="title"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Статья</label>

                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="20">{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>

                        <div class="tab-pane" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">Категория</label>

                                <select name="category_id"
                                        id="category_id"
                                        class="form-control"
                                        placeholder="Выберите категорию"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @endif>
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>

                            <input name="slug"
                                   value="{{ $item->slug }}"
                                   id="slug"
                                   class="form-control"
                                   type="text"
                            >
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выдержкв</label>

                            <textarea name="excerpt"
                                   id="excerpt"
                                   class="form-control"
                                   rows="3"
                            >{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input type="hidden"
                                   name="is_published"
                                   value="0"
                            >

                            <input type="checkbox"
                                   name="is_published"
                                   value="1"
                                   class="form-check-input"
                                   @if($item->is_published)
                                   checked="checked"
                                   @endif
                            >

                            <label for="is_published" class="form-check-label">Опубликованно</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>