@extends('layouts.admin')

@section('title', 'Add User')
@section('page-title', 'Add User')

@section('admin-content')
<div class="card">
    <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
        @csrf
        <div class="admin-form-section">
            <p class="admin-form-section-title">Basic Information</p>
            <div class="admin-form-grid admin-form-grid-2">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-input" placeholder="Enter first name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-input" placeholder="Enter last name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="name@email.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Enter password" required>
                </div>
            </div>
        </div>

        <div class="admin-form-section">
            <p class="admin-form-section-title">Address Details</p>
            <div class="admin-form-grid admin-form-grid-2">
                <div class="form-group admin-form-span-full">
                    <label class="form-label">Street Address</label>
                    <input type="text" name="street_address" class="form-input" placeholder="Street address">
                </div>

                <div class="form-group">
                    <label class="form-label">Apt / Suite / Unit</label>
                    <input type="text" name="apt_suite_unit" class="form-input" placeholder="Optional">
                </div>

                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-input" placeholder="City">
                </div>

                <div class="form-group">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-input" placeholder="State">
                </div>

                <div class="form-group">
                    <label class="form-label">ZIP</label>
                    <input type="text" name="zip" class="form-input" placeholder="ZIP code">
                </div>

                <div class="form-group admin-form-span-full">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-input" placeholder="Country">
                </div>
            </div>
        </div>

        <input type="hidden" name="role" value="user">

        <div class="admin-form-actions">
            <button type="submit" class="admin-btn">Create User</button>
        </div>
    </form>
</div>
@endsection
