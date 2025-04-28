pipeline {
    agent any
    stages {
        stage('Install Dependencies') {
            steps {
                bat 'npm install'  // Replace sh with bat for Windows
            }
        }
        stage('Build Project') {
            steps {
                bat 'npm run build'  // Again, using bat instead of sh
            }
        }
        // stage('Install Vercel CLI') {
        //     steps {
        //         bat 'npm install -g vercel'
        //     }
        // }

        // stage('Deploy to Vercel') {
        //     steps {
        //         bat 'vercel deploy'  // Deploy step with bat
        //     }
        // }
    }
}
