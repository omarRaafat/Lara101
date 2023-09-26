pipeline {
    agent { 
        kubernetes{
            label 'jenkins-slave'
        }
        
    }
    environment{
        DOCKER_USERNAME = credentials('DOCKER_USERNAME')
        DOCKER_PASSWORD = credentials('DOCKER_PASSWORD')
    }
    stages {
        // stage('docker login') {
        //     steps{
        //         sh(script: """
        //             docker login -u $DOCKER_USERNAME -p $DOCKER_PASSWORD
        //         """, returnStdout: true) 
        //     }
        // }

        // stage('git clone') {
        //     steps{
        //         sh(script: """
        //             git clone https://github.com/marcel-dempers/docker-development-youtube-series.git
        //         """, returnStdout: true) 
        //     }
        // }

        // stage('Building Docker Image....') {
        //     steps {
        //         echo "Building..."
		//     // build docker image from docker file injecting source code 
        //     // first command to update dockerimage value with the new one
        //     // second command removes all running container , networks and images (from docker compose only)
        //     // third one create new ones
        //              sh '''
                     
		//                 sed -i.bak "s|dockerImage|${dockerImage}|g" docker-compose.yml  
        //                 sed -i.bak "s|containerName|${BUILD_NUMBER}-lara101-app|g" docker-compose.yml  
        //           	    docker-compose -f docker-compose.yml build   
 
        //   			'''
		    
        //     }
        // }

       

        stage('deploy') {
            steps{
                sh script: '''
                #!/bin/bash
                #cd $WORKSPACE/docker-development-youtube-series/
                #get kubectl for this demo
                curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl
                chmod +x ./kubectl
                ./kubectl apply -f  deployment.yaml
                #cat ./kubernetes/deployments/deployment.yaml | sed s/1.0.0/${BUILD_NUMBER}/g | ./kubectl apply -f -
                
                '''
        }
    }
}
}