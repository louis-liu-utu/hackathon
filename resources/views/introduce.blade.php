@extends('layouts.app')

@section('title', 'About UTU')

@section('description', '')


@section('content')
    <section class="introduce container">
        <h1 class="main-title">Welcome to UTU!</h1>
        <p class="main-txt">
            UTU is a platform for real people that empowers the pursuit of truth, and transparency is vital to that pursuit. That’s why we want to be transparent about our legal terms and conditions.
        </p>
        <p class="main-txt">
            These terms are meant to create a safe space for self-expression
            and discourse, and to protect you as a member, us as a company, as well as the integrity of the platform.
        </p>
        <div class="introduce-list">
            <div class="introduce-item">
                <h2 class="introduce-item-title">
                    Things to keep in mind
                </h2>
                <p class="main-txt">
                    We limit who can join, when they join, and how, based on our guidelines and legal requirements.
                </p>
                <p class=" main-txt">
                    Expect changes as we iterate. Features and functions may not work as intended.
                </p>
                <p class=" main-txt">
                    UTU Tokens are just for use on UTU platform. You can’t use it as currency to purchase product or services.
                </p>
                <p class=" main-txt">
                    Free speech is our bedrock, but we also maintain a respectful environment.So that speech is subject to our Ground Rules.
                </p>
                <p class=" main-txt">
                    We reserve the right to terminate accounts and suspend accounts at any time.
                </p>
                <p class=" main-txt">
                    UTU is built on a blockchain, which is intended to be immutable. For more info, read the Privacy Notice.
                </p>
            </div>

            <div class="introduce-item">
                <h2 class="introduce-item-title">
                    This is just the beginning
                </h2>
                <p class="main-txt">
                UTU is currently in beta and like all new products with big ambitions, we need some time to get things right. We’re working hard to make this a platform that works for you and for us, as well as strengthen security, and ultimately create a product you’ll love.
                </p>
                <p class="main-txt">
                We’re starting beta testing in Australia and Canada, and we will steadily roll out globally.
                </p>
                <p class="main-txt">
                Because each place carries different legal and procedural requirements around identity verification and content moderation, we’ll need to take this step-by-step.
                </p>
                <p class="main-txt">
                As we grow, these requirements will continue to evolve and change. That being said, we’ll try our hardest to keep you posted throughout the process, but won’t always be able to reach out directly. We encourage you to keep checking the website as things progress to keep track of any new updates.
                </p>
                <p class="main-txt">
                In the meantime, please let us know if you have any feedback. We want to build this with you, so reach us anytime at help@utu.one. We’re excited to hear from you.
                </p>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
