@extends("layouts.noLogin")
@section("title","利用規約")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'利用規約'])

<div class="wrapper mb-20 leading-7 docs">
    <p class="mb-4">
        この利用規約（以下、「本規約」といいます。）は、U-laniwa開発者（以下、「当サービス提供者」といいます。）がこのウェブサイト上で提供するサービス（以下、「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下、「ユーザー」といいます。）には、本規約に従って、本サービスをご利用いただきます。
    </p>

    @include('components.noLogin.explain', [
    'title'=>'第 1 条（適用）',
    'text'=>'
    <ol>
        <li>本規約は、ユーザーと当サービス提供者との間の本サービスの利用に関わる一切の関係に適用されるものとします。</li>
        <li>当サービス提供者は本サービスに関し、本規約のほか、ご利用にあたってのルール等、各種の定め（以下、「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず、本規約の一部を構成するものとします。
        </li>
        <li>本規約の規定が前条の個別規定の規定と矛盾する場合には、個別規定において特段の定めなき限り、個別規定の規定が優先されるものとします。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 2 条（利用登録）',
    'text'=>'
    <ol>
        <li>本サービスにおいて利用登録ができるのは、U-lab に本入部している者、かつて U-lab に入部していた者、U-lab の入部を希望する者、U-lab
            内プロジェクトで関わりのある者に限ります。SecurityClearance に基づき、関わりに応じて適切なユーザーロールを選択できるか付与されます。</li>
        <li>本サービスにおいては、登録希望者が本規約に同意の上、U-laniwa
            にて本入部以上の権限を持つユーザーからの招待コードを用いて、当サービス提供者の定める方法によって利用登録を申請し、当サービス提供者がこれを承認することによって、利用登録が完了するものとします。</li>
        <li>当サービス提供者は、利用登録の申請者に以下の事由があると判断した場合、利用登録の申請を承認しないことがあり、その理由については一切の開示義務を負わないものとします。</li>
        <li>利用登録の申請に際して虚偽の事項を届け出た場合</li>
        <li>本規約に違反したことがある者からの申請である場合</li>
        <li>U-lab との関係が見られない場合</li>
        <li>その他、当サービス提供者が利用登録を相当でないと判断した場合</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 3 条（ユーザー ID およびパスワードの管理）',
    'text'=>'
    この条においてのユーザー ID は、ログインや会員登録で用いるメールアドレスと同義です。<br>
    <ol>
        <li>ユーザーは、自己の責任において、本サービスのユーザー ID およびパスワードを適切に管理するものとします。</li>
        <li>ユーザーは、自己の責任において、推測されにくい適切なパスワードを作成することとします。なお、サーバー上に保存されたパスワードはハッシュ化されており、適切なパスワードを設定された場合ハッシュ化された文字列からパスワードへの復元は困難となっており、安全性が保たれます。
        </li>
        <li>ユーザーは、いかなる場合にも、ユーザー ID およびパスワードを第三者に譲渡または貸与し、もしくは第三者と共用することはできません。当サービス提供者は、ユーザー ID
            とパスワードの組み合わせが登録情報と一致してログインされた場合には、そのユーザー ID を登録しているユーザー自身による利用とみなします。</li>
        <li>ユーザー ID 及びパスワードが第三者によって使用されたことによって生じた損害は、当サービス提供者に故意又は重大な過失がある場合を除き、当サービス提供者は一切の責任を負わないものとします。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 4 条（禁止事項）',
    'text'=>'
    <ol>
        <li>法令または公序良俗に違反する行為</li>
        <li>犯罪行為に関連する行為</li>
        <li>本サービスの内容等、本サービスに含まれる著作権、商標権ほか知的財産権を侵害する行為</li>
        <li>当サービス提供者、ほかのユーザー、またはその他第三者のサーバーまたはネットワークの機能を破壊したり、妨害したりする行為</li>
        <li>本サービスによって得られた自身以外の U-lab ユーザーの個別情報を外部に公開する行為</li>
        <li>本サービスによって得られた統計情報を出典なく公開する行為</li>
        <li>当サービス提供者のサービスの運営を妨害するおそれのある行為</li>
        <li>不正アクセスをし、またはこれを試みる行為</li>
        <li>不正な目的を持って本サービスを利用する行為</li>
        <li>本サービスの他のユーザーまたはその他の第三者に不利益、損害、不快感を与える行為</li>
        <li>他のユーザーに成りすます行為</li>
        <li>当サービス提供者、ほかのユーザー、またはその他第三者に不利益、損害、不快感を与えることによって当サービス提供者のサービスの運営を妨害する行為</li>
        <li>面識のない異性との出会いを目的とした行為</li>
        <li>当サービス提供者のサービスに関連して、反社会的勢力に対して直接または間接に利益を供与する行為</li>
        <li>招待コードを不特定多数に公開する行為</li>
        <li>招待コードを U-lab に入部を希望する者、またはプロジェクトなどで関わりのある者、以前 U-lab に所属していた者、現在 U-lab に所属している者以外に公開する行為</li>
        <li>U-lab ユーザーの匿名性のない個人情報を含むページを SNS など不特定多数に向けて公開する行為(自身の情報や匿名化された統計情報はこの限りでない)</li>
        <li>その他、当サービス提供者が不適切と判断する行為</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 5 条（本サービスの提供の停止等）',
    'text'=>'
    当サービス提供者は、以下のいずれかの事由があると判断した場合、ユーザーに事前に通知することなく本サービスの全部または一部の提供を停止または中断することができるものとします。<br>
    <ol>
        <li>本サービスにかかるコンピュータシステムの保守点検または更新を行う場合</li>
        <li>地震、落雷、火災、停電または天災などの不可抗力により、本サービスの提供が困難となった場合</li>
        <li>コンピュータまたは通信回線等が事故により停止した場合</li>
        <li>想定を超えるアクセスによりサーバーの負荷が限界に達した場合</li>
        <li>無料枠の制限を超えそうになった場合</li>
        <li>管理者やコードメンテナが居なくなった場合</li>
        <li>その他、当サービス提供者が本サービスの提供が困難と判断した場合</li>
        <li>当サービス提供者は、本サービスの提供の停止または中断により、ユーザーまたは第三者が被ったいかなる不利益または損害についても、一切の責任を負わないものとします。</li>
        <li>本サービスは U-laniwa 開発陣と U-lab 所属者である小畑の趣味によって運用されています。サービス停止の可能性があることを十分ご承知の上、ご利用ください。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 6 条（利用制限および登録抹消）',
    'text'=>'
    <ol>
        <li>本サービス利用者は SecurityClearance の Level に基づき、本サービスで利用できる機能が異なります。</li>
        <li>当サービス提供者は、ユーザーが以下のいずれかに該当する場合には、事前の通知なく、ユーザーに対して、本サービスの全部もしくは一部の利用を制限し、またはユーザーとしての登録を抹消することができるものとします。</li>
        <li>本規約のいずれかの条項に違反した場合</li>
        <li>登録事項に虚偽の事実があることが判明した場合</li>
        <li>氏名または連絡先が登録事項と一致しないことが判明した場合</li>
        <li>本サービスについて、最終の利用から一定期間利用がない場合</li>
        <li>その他、当サービス提供者が本サービスの利用を適当でないと判断した場合</li>
        <li>当サービス提供者は、本条に基づき当サービス提供者が行った行為によりユーザーに生じた損害について、一切の責任を負いません。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 7 条（退会）',
    'text'=>'
    <ol>
        <li>ユーザーは、当サービス提供者の定める退会手続により、本サービスから退会できるものとします。</li>
        <li>なお退会後もプロジェクトのデーターベースの整合性などの事情によりデータは保持され続けることがあります。</li>
        <li>本入部以上のユーザーは「退会」では無く「引退」を選択することで、大学卒業後も本サービスを利用できます。</li>
        <li>一度退会したユーザーは、再度同一メールアドレスで会員登録することはできません。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 8 条（保証の否認および免責事項）',
    'text'=>'
    <ol>
        <li>当サービス提供者は、本サービスに事実上または法律上の瑕疵（安全性、信頼性、正確性、完全性、有効性、特定の目的への適合性、セキュリティなどに関する欠陥、エラーやバグ、権利侵害などを含みます。）がないことを明示的にも黙示的にも保証しておりません。
        </li>
        <li>当サービス提供者は、ユーザー情報などのバックアップを保証しておりません。当サービス提供者の過失でデータが消失した場合であっても保証などは一切致しませんのでご了承ください。</li>
        <li>当サービス提供者は、本サービスに起因してユーザーに生じたあらゆる損害について一切の責任を負いません。ただし、本サービスに関する当サービス提供者とユーザーとの間の契約（本規約を含みます。）が消費者契約法に定める消費者契約となる場合、この免責規定は適用されません。
        </li>
        <li>前項ただし書に定める場合であっても、当サービス提供者は、当サービス提供者の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害のうち特別な事情から生じた損害（当サービス提供者またはユーザーが損害発生につき予見し、または予見し得た場合を含みます。）について一切の責任を負いません。また、当サービス提供者の過失（重過失を除きます。）による債務不履行または不法行為によりユーザーに生じた損害の賠償は、ユーザーから当該損害が発生した月に受領した利用料の額を上限とします。
        </li>
        <li>当サービス提供者は、本サービスに関して、ユーザーと他のユーザーまたは第三者との間において生じた取引、連絡または紛争等について一切責任を負いません。</li>
    </ol>'])

    @include('components.noLogin.explain', [
    'title'=>'第 9 条（サービス内容の変更等）',
    'text'=>'
    当サービス提供者は、ユーザーに通知することなく、本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし、これによってユーザーに生じた損害について一切の責任を負いません。'])

    @include('components.noLogin.explain', [
    'title'=>'第 10 条（利用規約の変更）',
    'text'=>'
    当サービス提供者は、必要と判断した場合には、ユーザーに通知することなくいつでも本規約を変更することができるものとします。なお、本規約の変更後、本サービスの利用を開始した場合には、当該ユーザーは変更後の規約に同意したものとみなします。'])

    @include('components.noLogin.explain', [
    'title'=>'第 11 条（個人情報の取扱い）',
    'text'=>'
    当サービス提供者は、本サービスの利用によって取得する個人情報については、当サービス提供者「プライバシーポリシー」に従い適切に取り扱うものとします。'])

    @include('components.noLogin.explain', [
    'title'=>'第 12 条（通知または連絡）',
    'text'=>'
    ユーザーと当サービス提供者との間の通知または連絡は、当サービス提供者の定める方法によって行うものとします。当サービス提供者は、ユーザーから、当サービス提供者が別途定める方式に従った変更届け出がない限り、現在登録されている連絡先が有効なものとみなして当該連絡先へ通知または連絡を行い、これらは、発信時にユーザーへ到達したものとみなします。'])

    @include('components.noLogin.explain', [
    'title'=>'第 13 条（準拠法・裁判管轄）',
    'text'=>'
    <ol>
        <li>本規約の解釈にあたっては、日本法を準拠法とします。</li>
        <li>本サービスに関して紛争が生じた場合には、当サービス提供者の所在地を管轄する裁判所を専属的合意管轄とします。</li>
    </ol>'])

    <p>制定: 2022年3月5日</p>
    <p>改定: 2022年3月5日</p>
</div>

@endsection