<x-elements.head :title="isset($title) ? $title . ' - ' . config('app.name') : config('app.name')" />

<body class="home-layout min-h-screen bg-white font-sans antialiased">

	<x-elements.header>
		<x-slot:baner>
			<img
				class="h-[108px] w-full"
				height="108"
				src="/baner-mini.jpg"
				width="1920"
			/>
		</x-slot:baner>
	</x-elements.header>

	<x-elements.navbar />

	<x-main2>
		<x-slot:title>
			<div @class([
				'lg:absolute -translate-y-8 lg:-translate-y-16',
				'lg:-translate-y-24' => isset($subTitle),
			])>
				<h2 class="text-4xl font-semibold">{{ $title }}</h2>
				@if (isset($subTitle))
					<h3 class="mt-1 text-3xl font-normal">{{ $subTitle }}</h3>
				@endif
			</div>
		</x-slot:title>
		<x-slot:sidebar
			class="bg-white px-4 lg:bg-inherit lg:pl-0 lg:pr-4"
			drawer="main-drawer"
		>
			<x-elements.user-side-menu />
		</x-slot:sidebar>
		<x-slot:content>
			{{ $slot }}
		</x-slot:content>
	</x-main2>
    
	<x-elements.footer />

	<x-toast />
</body>

</html>
