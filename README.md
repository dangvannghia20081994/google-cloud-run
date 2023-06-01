# Install project laravel (using sqlite)
 ```
 composer create-project laravel/laravel:^9.* example-app 
```

# Add GitHub Action
- Code base (.github/build/action.yml)
- Code environment (.github/build/dev.yml)

# Setup environment
- Goto repository in GitHub
- Setting
- Actions secrets and variables
- Actions
- New repository secret
- Add key: GCP_PROJECT_ID (project id in google console)
- Add key: [JSON_KEY_FILE](#JSON_KEY_FILE)
- Other key (Default config GitHub)

# Install google cloud (account add visa card) using Command line
- [Install SDK](https://cloud.google.com/sdk/docs/install-sdk)
- [Deploy](https://cloud.google.com/run/docs/deploying)
- [Cloud run](https://console.cloud.google.com/run)
- **Select service**
  + Tab **NETWORKING**: Ingress Control -> select All
  + Tab **SECURITY**: Authentication -> select Allow unauthenticated invocations


## JSON_KEY_FILE
- Login google console (https://console.cloud.google.com/)
- Menu
- IAM & Admin
- Service account (https://console.cloud.google.com/iam-admin/serviceaccounts)
- Create service account or using account default
- Select account
- Goto tab **KEYS** => **ADD KEY** => **CREATE NEW KEY** => download file key
- Add key to config ([Setup environment](#Setup environment))
