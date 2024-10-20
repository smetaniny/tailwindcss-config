```php
// database/migrations/2024_10_15_000001_create_content_table.php
// Здесь предполагается, что content — это массив, который может содержать данные (например, пути к файлам или строки).
// Мы можем создать таблицу, где каждый элемент массива будет записан как отдельная строка.
CreateContentTable 
php artisan make:migration create_orders_table
php artisan make:migration сreate_tw_content_table --create=tw_content --path=packages/smetaniny/tailwindcss-config/database/migrations
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // Каждое значение массива будет строкой
            $table->timestamps();
        });

        // Здесь можно добавить начальные данные
        DB::table('content')->insert([
            ['value' => 'path/to/file1'],
            ['value' => 'path/to/file2'],
            // Добавьте другие значения массива, если необходимо
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('content');
    }
}


// Похожий подход, так как presets — это массив. Мы можем создать таблицу, где каждый пресет будет отдельной записью.
// database/migrations/2024_10_15_000002_create_presets_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresetsTable extends Migration
{
    public function up()
    {
        Schema::create('presets', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // Строковое значение для каждого пресета
            $table->timestamps();
        });

        // Здесь можно добавить начальные данные
        DB::table('presets')->insert([
            ['value' => 'default-preset'],
            ['value' => 'custom-preset'],
            // Добавьте другие пресеты по необходимости
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('presets');
    }
}


// Параметр darkMode может иметь два значения: media или class. Можно создать таблицу для хранения этого значения
// с возможностью дальнейшего изменения.
// database/migrations/2024_10_15_000003_create_dark_mode_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarkModeTable extends Migration
{
    public function up()
    {
        Schema::create('dark_mode', function (Blueprint $table) {
            $table->id();
            $table->enum('mode', ['media', 'class'])->default('media'); // Определяем значения как enum
            $table->timestamps();
        });

        // Установим начальное значение
        DB::table('dark_mode')->insert([
            ['mode' => 'media'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('dark_mode');
    }
}


// Мы создадим таблицу accent_colors, в которой будут храниться возможные значения акцентных цветов.
// Каждый цвет будет храниться как отдельная запись. В случае, если акцентный цвет может быть динамическим
// (как в случае использования theme('colors')), мы можем расширить эту таблицу.
// database/migrations/2024_10_15_000004_create_accent_colors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccentColorsTable extends Migration
{
    public function up()
    {
        Schema::create('accent_colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name'); // Название цвета
            $table->string('color_value'); // Значение цвета в формате HEX, RGB или другое
            $table->boolean('is_auto')->default(false); // Флаг для цвета 'auto'
            $table->timestamps();
        });

        // Добавляем начальные значения для цветов
        DB::table('accent_colors')->insert([
            ['color_name' => 'blue', 'color_value' => '#3b82f6', 'is_auto' => false],
            ['color_name' => 'red', 'color_value' => '#ef4444', 'is_auto' => false],
            ['color_name' => 'green', 'color_value' => '#10b981', 'is_auto' => false],
            ['color_name' => 'auto', 'color_value' => 'auto', 'is_auto' => true], // Специальное значение для auto
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('accent_colors');
    }
}


// Создадим таблицу animations, которая будет хранить информацию об анимациях, включая их название, описание и
// параметры (например, продолжительность, функцию анимации, количество повторений и т. д.).

// database/migrations/2024_10_15_000005_create_animations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimationsTable extends Migration
{
    public function up()
    {
        Schema::create('animations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название анимации (например, 'spin', 'ping', 'pulse', 'bounce')
            $table->string('duration'); // Продолжительность анимации (например, '1s', '2s')
            $table->string('timing_function'); // Функция временного интервала анимации (например, 'linear', 'cubic-bezier(0, 0, 0.2, 1)')
            $table->boolean('infinite')->default(false); // Повторение анимации бесконечно или нет
            $table->timestamps();
        });

        // Добавляем начальные значения для анимаций
        DB::table('animations')->insert([
            ['name' => 'none', 'duration' => '0s', 'timing_function' => 'none', 'infinite' => false],
            ['name' => 'spin', 'duration' => '1s', 'timing_function' => 'linear', 'infinite' => true],
            ['name' => 'ping', 'duration' => '1s', 'timing_function' => 'cubic-bezier(0, 0, 0.2, 1)', 'infinite' => true],
            ['name' => 'pulse', 'duration' => '2s', 'timing_function' => 'cubic-bezier(0.4, 0, 0.6, 1)', 'infinite' => true],
            ['name' => 'bounce', 'duration' => '1s', 'timing_function' => 'linear', 'infinite' => true],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('animations');
    }
}


// Теперь создадим миграцию для настройки theme.aria. Эта конфигурация описывает различные атрибуты ARIA
// (Accessible Rich Internet Applications), которые используются для улучшения доступности веб-страниц для людей
// с ограниченными возможностями.
// database/migrations/2024_10_15_000006_create_aria_attributes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAriaAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('aria_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute'); // Название ARIA-атрибута (например, 'busy', 'checked')
            $table->string('value');     // Значение ARIA-атрибута (например, 'busy="true"', 'checked="true"')
            $table->timestamps();
        });

        // Добавляем начальные значения для ARIA-атрибутов
        DB::table('aria_attributes')->insert([
            ['attribute' => 'busy', 'value' => 'busy="true"'],
            ['attribute' => 'checked', 'value' => 'checked="true"'],
            ['attribute' => 'disabled', 'value' => 'disabled="true"'],
            ['attribute' => 'expanded', 'value' => 'expanded="true"'],
            ['attribute' => 'hidden', 'value' => 'hidden="true"'],
            ['attribute' => 'pressed', 'value' => 'pressed="true"'],
            ['attribute' => 'readonly', 'value' => 'readonly="true"'],
            ['attribute' => 'required', 'value' => 'required="true"'],
            ['attribute' => 'selected', 'value' => 'selected="true"'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('aria_attributes');
    }
}

// Теперь создадим миграцию для настройки theme.aspectRatio. Эта конфигурация описывает соотношение сторон
// для различных типов элементов, таких как квадратные изображения или видео.
// database/migrations/2024_10_15_000007_create_aspect_ratios_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspectRatiosTable extends Migration
{
    public function up()
    {
        Schema::create('aspect_ratios', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название типа соотношения (например, 'auto', 'square', 'video')
            $table->string('ratio'); // Значение соотношения сторон (например, 'auto', '1 / 1', '16 / 9')
            $table->timestamps();
        });

        // Добавляем начальные значения для соотношений сторон
        DB::table('aspect_ratios')->insert([
            ['name' => 'auto', 'ratio' => 'auto'],
            ['name' => 'square', 'ratio' => '1 / 1'],
            ['name' => 'video', 'ratio' => '16 / 9'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('aspect_ratios');
    }
}

// Теперь создадим миграцию для настройки theme.backdropBlur. Эта настройка отвечает за степень размытия заднего фона
// (backdrop) и использует значения из настройки theme.blur.
// database/migrations/2024_10_15_000008_create_backdrop_blur_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropBlurTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_blur', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня размытия (например, 'none', 'sm', 'md', 'lg', 'xl')
            $table->string('value'); // Значение размытия (например, '0', '4px', '8px')
            $table->timestamps();
        });

        // Добавляем начальные значения для размытия
        DB::table('backdrop_blur')->insert([
            ['name' => 'none', 'value' => '0'],
            ['name' => 'sm', 'value' => '4px'],
            ['name' => 'md', 'value' => '8px'],
            ['name' => 'lg', 'value' => '12px'],
            ['name' => 'xl', 'value' => '16px'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_blur');
    }
}

// Создадим миграцию для настройки theme.backdropBrightness. Эта настройка отвечает за изменение яркости заднего
// фона и использует значения из настройки theme.brightness.
// database/migrations/2024_10_15_000009_create_backdrop_brightness_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropBrightnessTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_brightness', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня яркости (например, 'default', '50', '75', '100')
            $table->string('value'); // Значение яркости (например, '50%', '75%', '100%')
            $table->timestamps();
        });

        // Добавляем начальные значения для яркости
        DB::table('backdrop_brightness')->insert([
            ['name' => '50', 'value' => '50%'],
            ['name' => '75', 'value' => '75%'],
            ['name' => '100', 'value' => '100%'],
            ['name' => '150', 'value' => '150%'],
            ['name' => '200', 'value' => '200%'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_brightness');
    }
}

// Для настройки theme.backdropContrast, которая определяет уровни контрастности заднего фона, и использует значения
// из настройки theme.contrast, создадим миграцию для таблицы, которая будет хранить различные уровни контрастности.
// database/migrations/2024_10_15_000010_create_backdrop_contrast_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropContrastTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_contrast', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня контрастности (например, 'default', '50', '75', '100')
            $table->string('value'); // Значение контрастности (например, '50%', '75%', '100%')
            $table->timestamps();
        });

        // Добавляем начальные значения для контрастности
        DB::table('backdrop_contrast')->insert([
            ['name' => '50', 'value' => '50%'],
            ['name' => '75', 'value' => '75%'],
            ['name' => '100', 'value' => '100%'],
            ['name' => '125', 'value' => '125%'],
            ['name' => '150', 'value' => '150%'],
            ['name' => '200', 'value' => '200%'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_contrast');
    }
}

// Для настройки theme.backdropGrayscale, которая управляет уровнями градаций серого для заднего фона и использует
// значения из theme.grayscale, создадим миграцию для таблицы, которая будет хранить различные уровни серого для заднего фона.
// database/migrations/2024_10_15_000011_create_backdrop_grayscale_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropGrayscaleTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_grayscale', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня градации серого (например, '0', '50', '100')
            $table->string('value'); // Значение градации серого (например, '0%', '50%', '100%')
            $table->timestamps();
        });

        // Добавляем начальные значения для градаций серого
        DB::table('backdrop_grayscale')->insert([
            ['name' => '0', 'value' => '0%'],   // Полноцветное изображение
            ['name' => '50', 'value' => '50%'], // Полусерое изображение
            ['name' => '100', 'value' => '100%'], // Полностью серое изображение
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_grayscale');
    }
}

// Для настройки theme.backdropHueRotate, которая управляет поворотом оттенков заднего фона и использует значения
// из theme.hueRotate, создадим миграцию для таблицы, которая будет хранить различные значения поворота оттенков.
// database/migrations/2024_10_15_000012_create_backdrop_hue_rotate_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropHueRotateTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_hue_rotate', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня поворота оттенка (например, '0', '10', '20')
            $table->string('value'); // Значение поворота оттенка в градусах (например, '0deg', '10deg', '20deg')
            $table->timestamps();
        });

        // Добавляем начальные значения для поворота оттенка
        DB::table('backdrop_hue_rotate')->insert([
            ['name' => '0', 'value' => '0deg'],   // Нет поворота
            ['name' => '10', 'value' => '10deg'], // Поворот на 10 градусов
            ['name' => '20', 'value' => '20deg'], // Поворот на 20 градусов
            ['name' => '30', 'value' => '30deg'], // Поворот на 30 градусов
            ['name' => '40', 'value' => '40deg'], // Поворот на 40 градусов
            ['name' => '50', 'value' => '50deg'], // Поворот на 50 градусов
            ['name' => '60', 'value' => '60deg'], // Поворот на 60 градусов
            ['name' => '70', 'value' => '70deg'], // Поворот на 70 градусов
            ['name' => '80', 'value' => '80deg'], // Поворот на 80 градусов
            ['name' => '90', 'value' => '90deg'], // Поворот на 90 градусов
            ['name' => '100', 'value' => '100deg'], // Поворот на 100 градусов
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_hue_rotate');
    }
}

// Для настройки theme.backdropInvert, которая управляет инверсией цвета заднего фона и использует значения
// из theme.invert, создадим миграцию для таблицы, которая будет хранить различные значения инверсии цвета.
// database/migrations/2024_10_15_000013_create_backdrop_invert_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropInvertTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_invert', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня инверсии (например, '0', '10')
            $table->string('value'); // Значение инверсии (например, '0%', '100%')
            $table->timestamps();
        });

        // Добавляем начальные значения для инверсии
        DB::table('backdrop_invert')->insert([
            ['name' => '0', 'value' => '0%'],    // Нет инверсии
            ['name' => '100', 'value' => '100%'], // Полная инверсия
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_invert');
    }
}

// Для настройки theme.backdropOpacity, которая управляет прозрачностью заднего фона и использует значения
// из theme.opacity, создадим миграцию для таблицы, которая будет хранить различные уровни прозрачности.

// database/migrations/2024_10_15_000014_create_backdrop_opacity_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropOpacityTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_opacity', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня прозрачности (например, '0', '50', '100')
            $table->float('value', 8, 6); // Значение прозрачности (например, 0.0 для 0%, 1.0 для 100%)
            $table->timestamps();
        });

        // Добавляем начальные значения для прозрачности
        DB::table('backdrop_opacity')->insert([
            ['name' => '0', 'value' => 0.0],   // 0% непрозрачность
            ['name' => '25', 'value' => 0.25],  // 25% прозрачность
            ['name' => '50', 'value' => 0.5],   // 50% прозрачность
            ['name' => '75', 'value' => 0.75],  // 75% прозрачность
            ['name' => '100', 'value' => 1.0],  // 100% непрозрачность
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_opacity');
    }
}

// Для настройки theme.backdropSaturate, которая управляет насыщенностью заднего фона и использует значения
// из theme.saturate, создадим миграцию для таблицы, которая будет хранить различные уровни насыщенности.
// database/migrations/2024_10_15_000015_create_backdrop_saturate_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropSaturateTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_saturate', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня насыщенности (например, '100', '150', '200')
            $table->float('value', 8, 6); // Значение насыщенности (например, 1.0 для 100%, 2.0 для 200%)
            $table->timestamps();
        });

        // Добавляем начальные значения для насыщенности
        DB::table('backdrop_saturate')->insert([
            ['name' => '100', 'value' => 1.0], // 100% (обычная насыщенность)
            ['name' => '150', 'value' => 1.5], // 150% (увеличенная насыщенность)
            ['name' => '200', 'value' => 2.0], // 200% (двойная насыщенность)
            ['name' => '50', 'value' => 0.5],  // 50% (уменьшенная насыщенность)
            ['name' => '0', 'value' => 0.0],   // 0% (без насыщенности, черно-белое)
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_saturate');
    }
}

// Для настройки theme.backdropSepia, которая управляет сепией заднего фона и использует значения из theme.sepia,
// создадим миграцию для таблицы, которая будет хранить различные уровни сепии.
// database/migrations/2024_10_15_000016_create_backdrop_sepia_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdropSepiaTable extends Migration
{
    public function up()
    {
        Schema::create('backdrop_sepia', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня сепии (например, '0', '50', '100')
            $table->float('value', 8, 6); // Значение сепии (например, 0.0 для 0%, 1.0 для 100%)
            $table->timestamps();
        });

        // Добавляем начальные значения для сепии
        DB::table('backdrop_sepia')->insert([
            ['name' => '0', 'value' => 0.0],  // 0% сепия (оригинальный цвет)
            ['name' => '50', 'value' => 0.5], // 50% сепия (умеренный эффект)
            ['name' => '100', 'value' => 1.0], // 100% сепия (полный эффект)
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('backdrop_sepia');
    }
}

// Для настройки theme.backgroundColor, которая управляет цветами фона и использует значения из theme.colors,
// создадим миграцию для таблицы, которая будет хранить различные цвета.Для настройки theme.backgroundColor,
// которая управляет цветами фона и использует значения из theme.colors, создадим миграцию для таблицы,
// которая будет хранить различные цвета.
// database/migrations/2024_10_15_000017_create_background_colors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundColorsTable extends Migration
{
    public function up()
    {
        Schema::create('background_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название цвета (например, 'red', 'blue')
            $table->string('hex_value'); // HEX значение цвета (например, '#ff0000')
            $table->timestamps();
        });

        // Добавляем начальные значения для цветов
        DB::table('background_colors')->insert([
            ['name' => 'white', 'hex_value' => '#ffffff'],
            ['name' => 'black', 'hex_value' => '#000000'],
            ['name' => 'red', 'hex_value' => '#ff0000'],
            ['name' => 'green', 'hex_value' => '#00ff00'],
            ['name' => 'blue', 'hex_value' => '#0000ff'],
            ['name' => 'yellow', 'hex_value' => '#ffff00'],
            ['name' => 'gray', 'hex_value' => '#808080'],
            // Добавьте дополнительные цвета по мере необходимости
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('background_colors');
    }
}

// Для реализации theme.backgroundImage, которая будет управлять фоновыми изображениями, в том числе градиентами,
// создадим миграцию для таблицы, которая будет хранить различные фоновые изображения и градиенты.

// database/migrations/2024_10_15_000018_create_background_images_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundImagesTable extends Migration
{
    public function up()
    {
        Schema::create('background_images', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название фонового изображения (например, 'gradient-to-t')
            $table->string('css_value'); // CSS значение для фона (например, 'linear-gradient(to top, var(--tw-gradient-stops))')
            $table->timestamps();
        });

        // Добавляем начальные значения для фоновых изображений
        DB::table('background_images')->insert([
            ['name' => 'none', 'css_value' => 'none'],
            ['name' => 'gradient-to-t', 'css_value' => 'linear-gradient(to top, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-tr', 'css_value' => 'linear-gradient(to top right, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-r', 'css_value' => 'linear-gradient(to right, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-br', 'css_value' => 'linear-gradient(to bottom right, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-b', 'css_value' => 'linear-gradient(to bottom, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-bl', 'css_value' => 'linear-gradient(to bottom left, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-l', 'css_value' => 'linear-gradient(to left, var(--tw-gradient-stops))'],
            ['name' => 'gradient-to-tl', 'css_value' => 'linear-gradient(to top left, var(--tw-gradient-stops))'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('background_images');
    }
}

// Для реализации theme.backgroundOpacity, которая управляет непрозрачностью фона, создадим миграцию для таблицы,
// которая будет хранить значения непрозрачности.
// database/migrations/2024_10_15_000019_create_background_opacities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundOpacitiesTable extends Migration
{
    public function up()
    {
        Schema::create('background_opacities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название значения непрозрачности
            $table->decimal('value', 3, 2); // Значение непрозрачности (например, 0.5)
            $table->timestamps();
        });

        // Добавляем начальные значения для непрозрачности фона
        DB::table('background_opacities')->insert([
            ['name' => '0', 'value' => 0.00],
            ['name' => '5', 'value' => 0.05],
            ['name' => '10', 'value' => 0.10],
            ['name' => '20', 'value' => 0.20],
            ['name' => '25', 'value' => 0.25],
            ['name' => '30', 'value' => 0.30],
            ['name' => '40', 'value' => 0.40],
            ['name' => '50', 'value' => 0.50],
            ['name' => '60', 'value' => 0.60],
            ['name' => '70', 'value' => 0.70],
            ['name' => '75', 'value' => 0.75],
            ['name' => '80', 'value' => 0.80],
            ['name' => '90', 'value' => 0.90],
            ['name' => '100', 'value' => 1.00],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('background_opacities');
    }
}

// Для реализации theme.backgroundPosition, которая управляет позиционированием фона, создадим миграцию для таблицы,
// которая будет хранить различные значения позиционирования фона.
// database/migrations/2024_10_15_000020_create_background_positions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundPositionsTable extends Migration
{
    public function up()
    {
        Schema::create('background_positions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название значения позиционирования фона
            $table->string('value'); // Значение позиционирования фона (например, 'bottom')
            $table->timestamps();
        });

        // Добавляем начальные значения для позиционирования фона
        DB::table('background_positions')->insert([
            ['name' => 'bottom', 'value' => 'bottom'],
            ['name' => 'center', 'value' => 'center'],
            ['name' => 'left', 'value' => 'left'],
            ['name' => 'left-bottom', 'value' => 'left bottom'],
            ['name' => 'left-top', 'value' => 'left top'],
            ['name' => 'right', 'value' => 'right'],
            ['name' => 'right-bottom', 'value' => 'right bottom'],
            ['name' => 'right-top', 'value' => 'right top'],
            ['name' => 'top', 'value' => 'top'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('background_positions');
    }
}
// Для реализации theme.backgroundSize, которая управляет размерами фона, создадим миграцию для таблицы,
// которая будет хранить различные значения размеров фона.
// database/migrations/2024_10_15_000021_create_background_sizes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundSizesTable extends Migration
{
    public function up()
    {
        Schema::create('background_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название значения размера фона
            $table->string('value'); // Значение размера фона (например, 'cover')
            $table->timestamps();
        });

        // Добавляем начальные значения для размеров фона
        DB::table('background_sizes')->insert([
            ['name' => 'auto', 'value' => 'auto'],
            ['name' => 'cover', 'value' => 'cover'],
            ['name' => 'contain', 'value' => 'contain'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('background_sizes');
    }
}


// Для реализации конфигурации theme.blur, которая управляет размерами размытия, создадим миграцию для таблицы, которая
// будет хранить различные значения размытия.
// database/migrations/2024_10_15_000022_create_blurs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlursTable extends Migration
{
    public function up()
    {
        Schema::create('blurs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название значения размытия
            $table->string('value'); // Значение размытия (например, '8px')
            $table->timestamps();
        });

        // Добавляем начальные значения для размытия
        DB::table('blurs')->insert([
            ['name' => '0', 'value' => '0'],
            ['name' => 'none', 'value' => ''],
            ['name' => 'sm', 'value' => '4px'],
            ['name' => 'DEFAULT', 'value' => '8px'],
            ['name' => 'md', 'value' => '12px'],
            ['name' => 'lg', 'value' => '16px'],
            ['name' => 'xl', 'value' => '24px'],
            ['name' => '2xl', 'value' => '40px'],
            ['name' => '3xl', 'value' => '64px'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('blurs');
    }
}

// Для конфигурации borderColor, которая управляет цветами границ,
// создадим миграцию для таблицы, которая будет хранить различные цвета границ.
// database/migrations/2024_10_15_000023_create_border_colors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderColorsTable extends Migration
{
    public function up()
    {
        Schema::create('border_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название цвета границы
            $table->string('value'); // Значение цвета (например, '#ffffff' или 'currentColor')
            $table->timestamps();
        });

        // Добавляем начальные значения для цветов границ
        DB::table('border_colors')->insert([
            ['name' => 'DEFAULT', 'value' => 'currentColor'],
            ['name' => 'gray.200', 'value' => '#e5e7eb'], // Пример серого цвета
            // Здесь можно добавить больше значений, если нужно
            // Например:
            // ['name' => 'red.500', 'value' => '#f87171'],
            // ['name' => 'blue.500', 'value' => '#3b82f6'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('border_colors');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения borderOpacity, чтобы управлять прозрачностью границ.
// Это значение будет связано с различными уровнями непрозрачности, которые мы будем определять в этой таблице.
// database/migrations/2024_10_15_000024_create_border_opacities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderOpacitiesTable extends Migration
{
    public function up()
    {
        Schema::create('border_opacities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название уровня прозрачности
            $table->decimal('value', 3, 2); // Значение прозрачности (от 0 до 1)
            $table->timestamps();
        });

        // Добавляем начальные значения для прозрачности границ
        DB::table('border_opacities')->insert([
            ['name' => 'DEFAULT', 'value' => 1.0], // Полная непрозрачность
            ['name' => '50', 'value' => 0.5], // 50% непрозрачности
            ['name' => '75', 'value' => 0.75], // 75% непрозрачности
            ['name' => '100', 'value' => 1.0], // 100% непрозрачности
            ['name' => '25', 'value' => 0.25], // 25% непрозрачности
            ['name' => '0', 'value' => 0.0], // Полная прозрачность
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('border_opacities');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения borderRadius. Эти значения будут представлять
// различные уровни радиуса границы для использования в приложении.
// database/migrations/2024_10_15_000025_create_border_radii_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderRadiiTable extends Migration
{
    public function up()
    {
        Schema::create('border_radii', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название радиуса границы
            $table->string('value'); // Значение радиуса границы
            $table->timestamps();
        });

        // Добавляем начальные значения для радиуса границы
        DB::table('border_radii')->insert([
            ['name' => 'none', 'value' => '0px'],
            ['name' => 'sm', 'value' => '0.125rem'],
            ['name' => 'DEFAULT', 'value' => '0.25rem'],
            ['name' => 'md', 'value' => '0.375rem'],
            ['name' => 'lg', 'value' => '0.5rem'],
            ['name' => 'xl', 'value' => '0.75rem'],
            ['name' => '2xl', 'value' => '1rem'],
            ['name' => '3xl', 'value' => '1.5rem'],
            ['name' => 'full', 'value' => '9999px'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('border_radii');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения borderSpacing. Эти значения будут представлять
// различные уровни отступов для границ.
// database/migrations/2024_10_15_000026_create_border_spacings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderSpacingsTable extends Migration
{
    public function up()
    {
        Schema::create('border_spacings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название отступа
            $table->string('value'); // Значение отступа
            $table->timestamps();
        });

        // Добавляем начальные значения для отступов границ
        DB::table('border_spacings')->insert([
            ['name' => '0', 'value' => '0px'],
            ['name' => '0.5', 'value' => '0.125rem'],
            ['name' => '1', 'value' => '0.25rem'],
            ['name' => '1.5', 'value' => '0.375rem'],
            ['name' => '2', 'value' => '0.5rem'],
            ['name' => '2.5', 'value' => '0.625rem'],
            ['name' => '3', 'value' => '0.75rem'],
            ['name' => '3.5', 'value' => '0.875rem'],
            ['name' => '4', 'value' => '1rem'],
            ['name' => '5', 'value' => '1.25rem'],
            ['name' => '6', 'value' => '1.5rem'],
            ['name' => '7', 'value' => '1.75rem'],
            ['name' => '8', 'value' => '2rem'],
            ['name' => '9', 'value' => '2.25rem'],
            ['name' => '10', 'value' => '2.5rem'],
            ['name' => '11', 'value' => '2.75rem'],
            ['name' => '12', 'value' => '3rem'],
            ['name' => '14', 'value' => '3.5rem'],
            ['name' => '16', 'value' => '4rem'],
            ['name' => '20', 'value' => '5rem'],
            ['name' => '24', 'value' => '6rem'],
            ['name' => '28', 'value' => '7rem'],
            ['name' => '32', 'value' => '8rem'],
            ['name' => '36', 'value' => '9rem'],
            ['name' => '40', 'value' => '10rem'],
            ['name' => '44', 'value' => '11rem'],
            ['name' => '48', 'value' => '12rem'],
            ['name' => '52', 'value' => '13rem'],
            ['name' => '56', 'value' => '14rem'],
            ['name' => '60', 'value' => '15rem'],
            ['name' => '64', 'value' => '16rem'],
            ['name' => '72', 'value' => '18rem'],
            ['name' => '80', 'value' => '20rem'],
            ['name' => '96', 'value' => '24rem'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('border_spacings');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения borderWidth.
// Эти значения будут представлять различные ширины границ. 
// database/migrations/2024_10_15_000027_create_border_widths_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderWidthsTable extends Migration
{
    public function up()
    {
        Schema::create('border_widths', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название ширины
            $table->string('value'); // Значение ширины
            $table->timestamps();
        });

        // Добавляем начальные значения для ширины границ
        DB::table('border_widths')->insert([
            ['name' => 'DEFAULT', 'value' => '1px'],
            ['name' => '0', 'value' => '0px'],
            ['name' => '2', 'value' => '2px'],
            ['name' => '4', 'value' => '4px'],
            ['name' => '8', 'value' => '8px'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('border_widths');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения boxShadow.
// Эти значения будут представлять различные эффекты тени для элементов.
// database/migrations/2024_10_15_000028_create_box_shadows_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxShadowsTable extends Migration
{
    public function up()
    {
        Schema::create('box_shadows', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название тени
            $table->string('value'); // Значение тени
            $table->timestamps();
        });

        // Добавляем начальные значения для теней
        DB::table('box_shadows')->insert([
            ['name' => 'sm', 'value' => '0 1px 2px 0 rgb(0 0 0 / 0.05)'],
            ['name' => 'DEFAULT', 'value' => '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)'],
            ['name' => 'md', 'value' => '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)'],
            ['name' => 'lg', 'value' => '0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)'],
            ['name' => 'xl', 'value' => '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)'],
            ['name' => '2xl', 'value' => '0 25px 50px -12px rgb(0 0 0 / 0.25)'],
            ['name' => 'inner', 'value' => 'inset 0 2px 4px 0 rgb(0 0 0 / 0.05)'],
            ['name' => 'none', 'value' => 'none'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('box_shadows');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения boxShadowColor. Эти значения будут представлять
// различные цвета, которые могут быть использованы для настройки теней элементов.
// database/migrations/2024_10_15_000029_create_box_shadow_colors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxShadowColorsTable extends Migration
{
    public function up()
    {
        Schema::create('box_shadow_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название цвета
            $table->string('value'); // Значение цвета
            $table->timestamps();
        });

        // Добавляем начальные значения для цветов теней
        DB::table('box_shadow_colors')->insert([
            ['name' => 'black', 'value' => 'rgb(0 0 0)'],
            ['name' => 'gray-200', 'value' => 'rgb(229 231 235)'],
            ['name' => 'gray-500', 'value' => 'rgb(107 114 128)'],
            ['name' => 'gray-600', 'value' => 'rgb(75 85 99)'],
            ['name' => 'gray-800', 'value' => 'rgb(31 41 55)'],
            ['name' => 'red-500', 'value' => 'rgb(220 38 38)'],
            ['name' => 'green-500', 'value' => 'rgb(22 163 74)'],
            ['name' => 'blue-500', 'value' => 'rgb(37 99 235)'],
            ['name' => 'yellow-500', 'value' => 'rgb(234 179 8)'],
            // Добавьте другие цвета по мере необходимости
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('box_shadow_colors');
    }
}

// Создадим миграцию для таблицы, которая будет хранить значения brightness. Эти значения могут
// использоваться для управления яркостью различных элементов в вашем приложении.
// database/migrations/2024_10_15_000030_create_brightness_levels_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrightnessLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('brightness_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('level'); // Уровень яркости
            $table->float('value'); // Значение яркости
            $table->timestamps();
        });

        // Добавляем начальные значения для уровней яркости
        DB::table('brightness_levels')->insert([
            ['level' => 0, 'value' => 0.0],
            ['level' => 50, 'value' => 0.5],
            ['level' => 75, 'value' => 0.75],
            ['level' => 90, 'value' => 0.9],
            ['level' => 95, 'value' => 0.95],
            ['level' => 100, 'value' => 1.0],
            ['level' => 105, 'value' => 1.05],
            ['level' => 110, 'value' => 1.1],
            ['level' => 125, 'value' => 1.25],
            ['level' => 150, 'value' => 1.5],
            ['level' => 200, 'value' => 2.0],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('brightness_levels');
    }
}

// Создадим миграцию для таблицы, которая будет хранить цвета каретки (caret color).
// Эти цвета могут использоваться в текстовых полях и других элементах интерфейса, где пользователь может вводить текст.
// database/migrations/2024_10_15_000031_create_caret_colors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretColorsTable extends Migration
{
    public function up()
    {
        Schema::create('caret_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя цвета
            $table->string('hex');  // Шестнадцатеричное значение цвета
            $table->timestamps();
        });

        // Добавляем начальные значения для цветов каретки
        DB::table('caret_colors')->insert([
            ['name' => 'black', 'hex' => '#000000'],
            ['name' => 'white', 'hex' => '#FFFFFF'],
            ['name' => 'red', 'hex' => '#FF0000'],
            ['name' => 'green', 'hex' => '#00FF00'],
            ['name' => 'blue', 'hex' => '#0000FF'],
            // Добавьте другие цвета по необходимости
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('caret_colors');
    }
}















































```
