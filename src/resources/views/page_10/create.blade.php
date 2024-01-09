<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ページ１０</title>
</head>

<body>
    <form method="POST" action="{{ route('page_10.store', $user) }}">
        @csrf

        <div class="title">
            <h1>出産の状態</h1>
        </div>

        <div class="container">
            <table border="1">
                <tr>
                    <th>妊娠期間</th>
                    <td colspan="3">
                        妊娠
                        <select name="pregnancy_weeks">
                            <option value=""></option>
                            @for ($i = 1; $i <= 99; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        週
                        <select name="pregnancy_days">
                            <option value=""></option>
                            @for ($i = 1; $i <= 999; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        日
                    </td>
                </tr>
                <tr>
                    <th>分娩日時</th>
                    <td colspan="3">
                        <input type="date" name="parturition_date">
                        <input type="time" name="parturition_time">
                    </td>
                </tr>
                <tr>
                    <th>分娩経過</th>
                    <td colspan="3">
                        <input type="hidden" name="parturition_progress_select" value="" checked>
                        <input type="radio" name="parturition_progress_select" value="1">頭囲
                        <input type="radio" name="parturition_progress_select" value="2">骨盤位
                        <input type="radio" name="parturition_progress_select" value="3">その他（<input
                            type="text" name="parturition_progress_other">）
                        <br>
                        特記事項：<input type="text" name="parturition_progress_remarks">
                    </td>
                </tr>
                <tr>
                    <th>分娩方法</th>
                    <td colspan="3"><input type="text" name="parturition_method"></td>
                </tr>
                <tr>
                    <th>分娩所要時間</th>
                    <td>
                        開始：<input type="time" name="parturition_required_time_start">
                        <br>
                        終了：<input type="time" name="parturition_required_time_end">
                    </td>
                    <th>出血量</th>
                    <td>
                        <input type="hidden" name="bleeding_amount_select" value="" checked>
                        <input type="radio" name="bleeding_amount_select" value="1">少量
                        <input type="radio" name="bleeding_amount_select" value="2">中量
                        <input type="radio" name="bleeding_amount_select" value="3">多量（ <input type="number"
                            step="0.1" name="bleeding_amount_ml" max="9999"> ml）
                    </td>
                </tr>
                <tr>
                    <th colspan="2">輸血（血液製剤含む）の有無</th>
                    <td colspan="2">
                        <input type="hidden" name="transfusion_select" value="" checked>
                        <input type="radio" name="transfusion_select" value="1">無
                        <input type="radio" name="transfusion_select" value="2">有（<input type="text"
                            name="transfusion_record">）
                    </td>
                </tr>
                <tr>
                    <th rowspan="4">出産時の児の状態</th>
                    <th>性別・数</th>
                    <td>
                        <input type="hidden" name="child_gender" value="" checked>
                        <input type="radio" name="child_gender" value="1">男
                        <input type="radio" name="child_gender" value="2">女
                        <input type="radio" name="child_gender" value="3">不明
                    </td>
                    <td>
                        <input type="hidden" name="single_or_multiple_select" value="" checked>
                        <input type="radio" name="single_or_multiple_select" value="1">単
                        <input type="radio" name="single_or_multiple_select" value="2">多（
                        <select name="single_or_multiple_count">
                            <option value=""></option>
                            @for ($i = 1; $i <= 99; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        胎）
                    </td>
                </tr>
                <tr>
                    <th rowspan="2">計測値</th>
                    <td>体重：<input type="number" step="0.1" name="weight" max="9999"> g</td>
                    <td>身長：<input type="number" step="0.1" name="height" max="999"> cm</td>
                </tr>
                <tr>
                    <td>頭囲：<input type="number" step="0.1" name="head_circumference" max="999"> cm</td>
                    <td>胸囲：<input type="number" step="0.1" name="chest_measurement" max="999"> cm</td>
                </tr>
                <tr>
                    <th>特別な所見・処置</th>
                    <td colspan="2">
                        新生児仮死→（
                        <input type="hidden" name="special_findings_treatment" value="" checked>
                        <input type="radio" name="special_findings_treatment" value="1">死亡
                        ・
                        <input type="radio" name="special_findings_treatment" value="2">蘇生
                        ）・
                        <input type="radio" name="special_findings_treatment" value="3">死産
                    </td>
                </tr>
                <tr>
                    <th>証明</th>
                    <td colspan="3">
                        <input type="hidden" name="proof" value="" checked>
                        <input type="radio" name="proof" value="1">出生証明書
                        <br>
                        <input type="radio" name="proof" value="2">死産証書（死胎検案書）
                        <br>
                        <input type="radio" name="proof" value="3">出生証明書及び死亡診断書
                    </td>
                </tr>
                <tr>
                    <th>出生の場所<br>名称</th>
                    <td colspan="3"><input type="text" name="child_birth_location"></td>
                </tr>
                <tr>
                    <th>分娩取扱者<br>氏名</th>
                    <td colspan="3">
                        医師　：<input type="text" name="parturition_handler_name_docter">
                        <br>
                        助産師：<input type="text" name="parturition_handler_name_midwife">
                        <br>
                        その他：<input type="text" name="parturition_handler_name_other">
                    </td>
                </tr>
            </table>
        </div>

        {{-- ボタン --}}
        <div>
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('main.index', $user) }}">戻る</a>
        </div>

    </form>

</body>

</html>
