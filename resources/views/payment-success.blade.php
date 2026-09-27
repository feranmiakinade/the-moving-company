<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Confirmed | The Moving Company</title>

   <style>
    :root {
        --yellow: #F5C518;
        --yellow-dark: #E0AE0C;
        --black: #050505;
        --near-black: #111111;
        box-sizing: border-box;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        background: var(--black);
        color: #fff;
        min-height: 100vh;
        min-height: 100dvh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        -webkit-font-smoothing: antialiased;
    }

    .success-card {
        width: 100%;
        max-width: 560px;
        background: var(--near-black);
        border: 1px solid #292929;
        border-radius: 24px;
        padding: 56px 44px;
        text-align: center;
        opacity: 0;
        transform: translateY(16px);
        animation: cardIn .6s ease forwards;
    }

    @keyframes cardIn {
        to { opacity: 1; transform: translateY(0); }
    }

    .success-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto 28px;
        border-radius: 50%;
        background: var(--yellow);
        color: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: 700;
        box-shadow: 0 0 0 8px rgba(245,197,24,0.08);
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--yellow);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2.5px;
        margin-bottom: 16px;
    }
    .eyebrow::before,
    .eyebrow::after {
        content: "";
        width: 20px;
        height: 1.5px;
        background: var(--yellow);
        opacity: 0.5;
    }

    h1 {
        font-size: clamp(2rem, 5.5vw, 3.2rem);
        font-weight: 900;
        line-height: 1.02;
        letter-spacing: -1.5px;
        text-transform: uppercase;
        margin-bottom: 18px;
    }

    .intro {
        color: #a8a8a8;
        font-size: 15.5px;
        line-height: 1.7;
        margin-bottom: 36px;
    }

    .booking-details {
        text-align: left;
        background: rgba(255,255,255,0.02);
        border: 1px solid #292929;
        border-radius: 16px;
        padding: 8px 22px;
        margin-bottom: 34px;
    }

    .detail {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        gap: 20px;
        padding: 16px 0;
        border-bottom: 1px solid #232323;
    }
    .detail:last-child {
        border-bottom: none;
    }

    .detail span:first-child {
        color: #888;
        font-size: 14px;
    }

    .detail span:last-child {
        text-align: right;
        font-weight: 600;
        font-size: 14.5px;
    }

    .total span:first-child {
        color: #ccc;
    }
    .total span:last-child {
        color: var(--yellow) !important;
        font-size: 20px;
        font-weight: 800;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--yellow);
        color: #000;
        text-decoration: none;
        padding: 15px 32px;
        border-radius: 50px;
        font-size: 14.5px;
        font-weight: 700;
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(245,197,24,0.3);
    }

    @media (prefers-reduced-motion: reduce) {
        .success-card {
            animation: none;
            opacity: 1;
            transform: none;
        }
    }

    @media (max-width: 600px) {
        .success-card {
            padding: 40px 24px;
            border-radius: 20px;
        }

        h1 {
            letter-spacing: -1px;
        }

        .booking-details {
            padding: 4px 18px;
        }

        .detail {
            flex-direction: column;
            gap: 4px;
            padding: 14px 0;
        }

        .detail span:last-child {
            text-align: left;
        }

        .total span:last-child {
            font-size: 18px;
        }
    }
</style>
</head>

<body>

    <main class="success-card">

        <div class="success-icon">✓</div>

        <p class="eyebrow">BOOKING CONFIRMED</p>

        <h1>You're all set.</h1>

        <p class="intro">
            Your payment has been confirmed and your booking is now secured.
            Thank you for choosing The Moving Company.
        </p>

        <div class="booking-details">

            <div class="detail">
                <span>Booking Name</span>
                <span>{{ $booking->full_name }}</span>
            </div>

            <div class="detail">
                <span>Vehicle</span>
                <span>{{ $booking->vehicle }}</span>
            </div>

            <div class="detail">
                <span>Pickup Date</span>
                <span>{{ $booking->pickup_date->format('d M Y') }}</span>
            </div>

            <div class="detail">
                <span>Return Date</span>
                <span>{{ $booking->return_date->format('d M Y') }}</span>
            </div>

            <div class="detail">
                <span>Pickup Location</span>
                <span>{{ $booking->pickup_location }}</span>
            </div>

            <div class="detail">
                <span>Payment</span>
                <span>Paid</span>
            </div>

            <div class="detail total">
                <span>Total</span>
                <span>₦{{ number_format($booking->total_amount) }}</span>
            </div>

        </div>

        <a href="/" class="back-button">
            Back to Home
        </a>

    </main>

</body>
</html>