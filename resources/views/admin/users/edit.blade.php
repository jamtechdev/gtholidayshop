@extends('layouts.admin')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="admin-form">
        @csrf
        @method('PUT')
        <div class="admin-form-section">
            <p class="admin-form-section-title">Basic Information</p>
            <div class="admin-form-grid admin-form-grid-2">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-input" placeholder="Enter first name" value="{{ $user->first_name ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-input" placeholder="Enter last name" value="{{ $user->last_name ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="name@email.com" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Leave blank to keep current password">
                </div>
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">Address Details</p>
            <div class="admin-form-grid admin-form-grid-2">
                <div class="form-group admin-form-span-full">
                    <label class="form-label">Street Address</label>
                    <input type="text" name="street_address" class="form-input" placeholder="Street address" value="{{ $user->street_address ?? '' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Apt / Suite / Unit</label>
                    <input type="text" name="apt_suite_unit" class="form-input" placeholder="Optional" value="{{ $user->apt_suite_unit ?? '' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-input" placeholder="City" value="{{ $user->city ?? '' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-input" placeholder="State" value="{{ $user->state ?? '' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">ZIP</label>
                    <input type="text" name="zip" class="form-input" placeholder="ZIP code" value="{{ $user->zip ?? '' }}">
                </div>

                <div class="form-group admin-form-span-full">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-input" placeholder="Country" value="{{ $user->country ?? '' }}">
                </div>
            </div>
        </div>

        <input type="hidden" name="role" value="{{ $user->role }}">

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Update User</button>
        </div>
    </form>
</div>
@endsection
