# Subscriptions
This will add Subscription Plans to your laravel project.
Create the plan and his features for the user to register to.
You can add many features and update the feature's order.

## Installation
Update your project's `composer.json` file.

```bash
composer require bpocallaghan/subscriptions
```

## Usage

Register the routes in the `routes/vendor.php` file.
- Website
```bash
Route::resource('pricing', 'Subscriptions\Controllers\Website\SubscriptionsController');
```
- Admin
```bash
Route::group(['prefix' => 'settings', 'namespace' => 'Subscriptions\Controllers\Admin'],
	function () {
		Route::resource('subscription-plans/features', 'FeaturesController');
		Route::resource('subscription-plans', 'SubscriptionPlansController');
		Route::get('subscription-plans/{subscription_plan}/features/order',
			'SubscriptionPlansController@showFeaturesOrder');
		Route::post('subscription-plans/{subscription_plan}/features/order',
			'SubscriptionPlansController@updateFeaturesOrder');
	});
```

## Commands
```bash
php artisan subscriptions:publish
```
This will copy the `database/seeds` and `database/migrations` to your application.
Remember to add `$this->call(SubscriptionPlanFeaturesSeeder::class); $this->call(SubscriptionPlanTableSeeder::class);` in the `DatabaseSeeder.php`

```bash
php artisan subscriptions:publish --files=all
```
This will copy the `models, views and controllers` to their respective directories.
Please note when you execute the above command. You need to update your `routes`.
- Website
```bash 
Route::get('/pricing', 'SubscriptionsController@index');
```
- Admin
```bash
Route::group(['namespace' => 'Subscriptions'], function () {
	Route::resource('subscription-plans/features', 'FeaturesController');
	Route::resource('subscription-plans', 'SubscriptionPlansController');
	Route::get('subscription-plans/{subscription_plan}/features/order',
		'SubscriptionPlansController@showFeaturesOrder');
	Route::post('subscription-plans/{subscription_plan}/features/order',
		'SubscriptionPlansController@updateFeaturesOrder');
});
```

## Demo
Package is being used at [Laravel Admin Starter](https://github.com/bpocallaghan/laravel-admin-starter) project.

### TODO
- add the navigation seeder information (to create the navigation/urls)