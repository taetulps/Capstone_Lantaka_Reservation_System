<!DOCTYPE html>
<html>
    <body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px;">
        <div style="max-width: 600px; margin: auto; border: 1px solid #eee; padding: 20px; border-radius: 10px;">
            <h2 style="color: #2c3e50;">Thank you for staying with us!</h2>
            <p>Dear {{ $reservation->user->name }},</p>
            <p>This email confirms that you have successfully **checked out** from Adzu Lantaka Campus.</p>
            
            <div style="background: #f4f4f4; padding: 15px; border-radius: 5px;">
                <strong>Stay Details:</strong><br>
                Accommodation: {{ $reservation->type === 'room' ? 'Room ' . ($reservation->room->room_number ?? 'N/A') : ($reservation->venue->name ?? 'Venue') }}<br>
                Check-out Date: {{ now()->format('F d, Y') }}<br>
                Total Amount Paid: ₱ {{ number_format($reservation->total_amount, 2) }}
            </div>

            <p>We hope you had a pleasant experience. We would love to see you again soon!</p>
            
            <p>Best Regards,<br><strong>Lantaka Campus Team</strong></p>
        </div>
    </body>
</html>