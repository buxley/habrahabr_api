<?php

	namespace Habrahabr_api;

	use Habrahabr_api\HttpAdapter\HttpAdapterInterface;
	use Habrahabr_api\Resources\UserResource;

	class Habrahabr_api
	{
		protected   $adapter;

		private     $singleton = [];

		public function __construct( HttpAdapterInterface $adapter = NULL )
		{
			$this->adapter = $adapter;
		}


		/**
		 * @return UserResource
		 */
		public function getUserResource()
		{
			if( isset( $this->singleton['user_resource'] ) )
			{
				return $this->singleton['user_resource'];
			}

			$this->singleton['user_resource'] = (new UserResource())->setAdapter( $this->adapter );

			return $this->singleton['user_resource'];
		}
	}