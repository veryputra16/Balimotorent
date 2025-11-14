<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Order #{{ $loan->id }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
            data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 0.5s ease-out; }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center px-4">

    <div class="fade-in-up w-full max-w-md backdrop-blur-xl bg-white/70 shadow-2xl 
                rounded-2xl border border-white/40 p-8">

        <!-- Header -->
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-1">
            💳 Payment Summary
        </h1>
        <p class="text-center text-gray-500 mb-6">Order #{{ $loan->order_id }}</p>

        <!-- Price Card -->
        <div class="bg-white shadow-inner rounded-xl p-5 mb-8 border border-gray-100">
            <p class="text-sm text-gray-500">Total Amount</p>
            <p class="text-4xl font-extrabold text-blue-600 tracking-tight">
                Rp {{ number_format($loan->total_price, 0, ',', '.') }}
            </p>
        </div>

        <!-- Pay Button -->
        <button 
            id="pay-button"
            class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white 
                   text-lg font-semibold shadow-lg transform transition-all 
                   duration-200 hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-2">
            <span id="pay-text">Pay Now</span>
            <svg id="pay-loading" class="animate-spin h-5 w-5 hidden" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="white" stroke-width="4"></circle>
                <path class="opacity-75" fill="white" 
                      d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16c-.34 0-.67-.02-1-.05v-4l-3 3 3 3v-4a8 8 0 01-7-8z"/>
            </svg>
        </button>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            Secure payment powered by <span class="font-semibold">Midtrans</span>
        </p>
    </div>


    <!-- Scripts -->
    <script>
        const payBtn = document.getElementById('pay-button');
        const payText = document.getElementById('pay-text');
        const payLoading = document.getElementById('pay-loading');

        payBtn.addEventListener('click', function() {
            payBtn.disabled = true;
            payText.textContent = "Processing...";
            payLoading.classList.remove("hidden");

            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('payment.success', ['id' => $loan->id]) }}";
                },
                onPending: function(result) {
                    window.location.href = "{{ route('payment.pending', ['id' => $loan->id]) }}";
                },
                onError: function(result) {
                    alert("Payment failed: " + result.status_message);
                    window.location.href = "{{ route('payment.failed', ['id' => $loan->id]) }}";
                },
                onClose: function() {
                    payBtn.disabled = false;
                    payText.textContent = "Pay Now";
                    payLoading.classList.add("hidden");
                }
            });
        });
    </script>

</body>
</html>
