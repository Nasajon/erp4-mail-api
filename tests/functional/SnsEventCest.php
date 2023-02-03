<?php

use Codeception\Util\HttpCode;

/**
 * Testes para os eventos do sns
 * Para gerar dados de exemplo
 * https://docs.aws.amazon.com/ses/latest/DeveloperGuide/send-email-simulator.html
 * referência dos jsons de mensagens e regras de negócio
 * https://docs.aws.amazon.com/pt_br/sns/latest/dg/sns-http-https-endpoint-as-subscriber.html
 * https://docs.aws.amazon.com/pt_br/ses/latest/DeveloperGuide/notification-examples.html
 * https://docs.aws.amazon.com/pt_br/ses/latest/DeveloperGuide/event-publishing-retrieving-sns-examples.html
 * https://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html
 * https://aws.amazon.com/pt/blogs/messaging-and-targeting/open-and-click-tracking-have-arrived/
 * https://aws.amazon.com/pt/premiumsupport/knowledge-center/ses-email-opens-clicks/
 * https://docs.aws.amazon.com/pt_br/ses/latest/DeveloperGuide/event-publishing-add-event-destination-sns.html
 * https://docs.aws.amazon.com/pt_br/ses/latest/DeveloperGuide/send-email-simulator.html#send-email-simulator-how-to-use
 */
class SnsEventCest
{

    public function _before(FunctionalTester $I)
    {
        //esta rota não deve ser autenticada
        //$I->amLoggedInAsSistema(4);
    }

    protected function getEvent(array $message = []): array
    {
        return
            [
                'Type' => 'Notification',
                'MessageId' => '165545c9-2a5c-472c-8df2-7ff2be2b3b1b',
                'TopicArn' => 'arn:aws:sns:us-west-2:649454681089:maladireta-bounces-producao',
                'Token' => '2336412f37',
                'Message' => json_encode($message),
                'Timestamp' => '2012-04-25T21:49:25.719Z',
                'SignatureVersion' => '1',
                'Signature' => 'EXAMPLElDMXvB8r9R83tGoNn0ecwd5UjllzsvSvbItzfaMpN2nk5HVSw7XnOn/49IkxDKz8YrlH2qJXj2iZB0Zo2O71c4qQk1fMUDi3LGpij7RCW7AW9vYYsSqIKRnFS94ilu7NFhUzLiieYr4BKHpdTmdD6c0esKEYBpabxDSc=',
                'SigningCertURL' => 'https://sns.us-west-2.amazonaws.com/SimpleNotificationService-f3ecfb7224c7233fe7bb5f59f96de52f.pem',
                'UnsubscribeURL' => 'https://sns.us-west-2.amazonaws.com/?Action=Unsubscribe&Subscriptionarn:aws:sns:us-west-2:649454681089:maladireta-bounces-producao:2bcfbf39-05c3-41de-beaa-fcfcc21c8f55'
            ];
    }

    protected function getBounceMessage(): array
    {
        return [
            "eventType" => "Bounce",
            "bounce" => [
                "bounceType" => "Permanent",
                "bounceSubType" => "General",
                "bouncedRecipients" => [
                    [
                        "emailAddress" => "jane@example.com"
                    ],
                    [
                        "emailAddress" => "richard@example.com"
                    ]
                ],
                "timestamp" => "2016-01-27T14:59:38.237Z",
                "feedbackId" => "00000137860315fd-869464a4-8680-4114-98d3-716fe35851f9-000000",
                "remoteMtaIp" => "127.0.2.0"
            ],
            "mail" => [
                "timestamp" => "2016-01-27T14:59:38.237Z",
                "messageId" => "00000137860315fd-34208509-5b74-41f3-95c5-22c1edc3c924-000001",
                "source" => "john@example.com",
                "sourceArn" => "arn:aws:ses:us-west-2:888888888888:identity/example.com",
                "sourceIp" => "127.0.3.0",
                "sendingAccountId" => "123456789012",
                "destination" => [
                    "jane@example.com",
                    "mary@example.com",
                    "richard@example.com"
                ],
                "headersTruncated" => false,
                "headers" => [
                    [
                        "name" => "From",
                        "value" => '"John Doe" <john@example.com>'
                    ],
                    [
                        "name" => "To",
                        "value" => '"Jane Doe" <jane@example.com>, "Mary Doe" <mary@example.com>, "Richard Doe" <richard@example.com>'
                    ],
                    [
                        "name" => "Message-ID",
                        "value" => "custom-message-ID"
                    ],
                    [
                        "name" => "Subject",
                        "value" => "Hello"
                    ],
                    [
                        "name" => "Content-Type",
                        "value" => 'text/plain; charset="UTF-8"'
                    ],
                    [
                        "name" => "Content-Transfer-Encoding",
                        "value" => "base64"
                    ],
                    [
                        "name" => "Date",
                        "value" => "Wed, 27 Jan 2016 14:05:45 +0000"
                    ]
                ],
                "commonHeaders" => [
                    "from" => [
                        "John Doe <john@example.com>"
                    ],
                    "date" => "Wed, 27 Jan 2016 14:05:45 +0000",
                    "to" => [
                        "Jane Doe <jane@example.com>, Mary Doe <mary@example.com>, Richard Doe <richard@example.com>"
                    ],
                    "messageId" => "custom-message-ID",
                    "subject" => "Hello"
                ]
            ]
        ];
    }

    protected function getComplaintMessage(): array
    {

        return [
            "eventType" => "Complaint",
            "complaint" => [
                "complainedRecipients" => [
                    [
                        "emailAddress" => "richard@example.com"
                    ]
                ],
                "timestamp" => "2016-01-27T14:59:38.237Z",
                "feedbackId" => "0000013786031775-fea503bc-7497-49e1-881b-a0379bb037d3-000000"
            ],
            "mail" => [
                "timestamp" => "2016-01-27T14:59:38.237Z",
                "messageId" => "0000013786031775-163e3910-53eb-4c8e-a04a-f29debf88a84-000002",
                "source" => "john@example.com",
                "sourceArn" => "arn:aws:ses:us-west-2:888888888888:identity/example.com",
                "sourceIp" => "127.0.3.0",
                "sendingAccountId" => "123456789012",
                "destination" => [
                    "jane@example.com",
                    "mary@example.com",
                    "richard@example.com"
                ],
                "headersTruncated" => false,
                "headers" => [
                    [
                        "name" => "From",
                        "value" => 'John Doe" <john@example.com>'
                    ],
                    [
                        "name" => "To",
                        "value" => '"Jane Doe" <jane@example.com>, "Mary Doe" <mary@example.com>, "Richard Doe" <richard@example.com>'
                    ],
                    [
                        "name" => "Message-ID",
                        "value" => "custom-message-ID"
                    ],
                    [
                        "name" => "Subject",
                        "value" => "Hello"
                    ],
                    [
                        "name" => "Content-Type",
                        "value" => 'text/plain; charset="UTF-8"'
                    ],
                    [
                        "name" => "Content-Transfer-Encoding",
                        "value" => "base64"
                    ],
                    [
                        "name" => "Date",
                        "value" => "Wed, 27 Jan 2016 14:05:45 +0000"
                    ]
                ],
                "commonHeaders" => [
                    "from" => [
                        "John Doe <john@example.com>"
                    ],
                    "date" => "Wed, 27 Jan 2016 14:05:45 +0000",
                    "to" => [
                        "Jane Doe <jane@example.com>, Mary Doe <mary@example.com>, Richard Doe <richard@example.com>"
                    ],
                    "messageId" => "custom-message-ID",
                    "subject" => "Hello"
                ]
            ]
        ];
    }

    protected function getOpenMessage(): array
    {

        return [
            "eventType" => "Open",
            "mail" => [
                "commonHeaders" => [
                    "from" => [
                        "sender@example.com"
                    ],
                    "messageId" => "EXAMPLE7c191be45-e9aedb9a-02f9-4d12-a87d-dd0099a07f8a-000000",
                    "subject" => "Message sent from Amazon SES",
                    "to" => [
                        "recipient@example.com"
                    ]
                ],
                "destination" => [
                    "recipient@example.com"
                ],
                "headers" => [
                    [
                        "name" => "X-SES-CONFIGURATION-SET",
                        "value" => "ConfigSet"
                    ],
                    [
                        "name" => "X-SES-MESSAGE-TAGS",
                        "value" => "myCustomTag1=myCustomValue1, myCustomTag2=myCustomValue2"
                    ],
                    [
                        "name" => "From",
                        "value" => "sender@example.com"
                    ],
                    [
                        "name" => "To",
                        "value" => "recipient@example.com"
                    ],
                    [
                        "name" => "Subject",
                        "value" => "Message sent from Amazon SES"
                    ],
                    [
                        "name" => "MIME-Version",
                        "value" => "1.0"
                    ],
                    [
                        "name" => "Content-Type",
                        "value" => 'multipart/alternative; boundary="XBoundary"'
                    ]
                ],
                "headersTruncated" => false,
                "messageId" => "EXAMPLE7c191be45-e9aedb9a-02f9-4d12-a87d-dd0099a07f8a-000000",
                "sendingAccountId" => "123456789012",
                "source" => "sender@example.com",
                "tags" => [
                    "myCustomTag1" => [
                        "myCustomValue1"
                    ],
                    "myCustomTag2" => [
                        "myCustomValue2"
                    ],
                    "ses:caller-identity" => [
                        "ses-user"
                    ],
                    "ses:configuration-set" => [
                        "ConfigSet"
                    ],
                    "ses:from-domain" => [
                        "example.com"
                    ],
                    "ses:source-ip" => [
                        "192.0.2.0"
                    ]
                ],
                "timestamp" => "2017-08-09T21:59:49.927Z"
            ],
            "open" => [
                "ipAddress" => "192.0.2.1",
                "timestamp" => "2017-08-09T22:00:19.652Z",
                "userAgent" => "Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Mobile/14G60"
            ]
        ];
    }

    protected function getClickMessage(): array
    {

        return [
            "eventType" => "Click",
            "click" => [
                "ipAddress" => "192.0.2.1",
                "link" => "http://docs.aws.amazon.com/ses/latest/DeveloperGuide/send-email-smtp.html",
                "linkTags" => [
                    "samplekey0" => [
                        "samplevalue0"
                    ],
                    "samplekey1" => [
                        "samplevalue1"
                    ]
                ],
                "timestamp" => "2017-08-09T23:51:25.570Z",
                "userAgent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36"
            ],
            "mail" => [
                "commonHeaders" => [
                    "from" => [
                        "sender@example.com"
                    ],
                    "messageId" => "EXAMPLE7c191be45-e9aedb9a-02f9-4d12-a87d-dd0099a07f8a-000000",
                    "subject" => "Message sent from Amazon SES",
                    "to" => [
                        "recipient@example.com"
                    ]
                ],
                "destination" => [
                    "recipient@example.com"
                ],
                "headers" => [
                    [
                        "name" => "X-SES-CONFIGURATION-SET",
                        "value" => "ConfigSet"
                    ],
                    [
                        "name" => "X-SES-MESSAGE-TAGS",
                        "value" => "myCustomTag1=myCustomValue1, myCustomTag2=myCustomValue2"
                    ],
                    [
                        "name" => "From",
                        "value" => "sender@example.com"
                    ],
                    [
                        "name" => "To",
                        "value" => "recipient@example.com"
                    ],
                    [
                        "name" => "Subject",
                        "value" => "Message sent from Amazon SES"
                    ],
                    [
                        "name" => "MIME-Version",
                        "value" => "1.0"
                    ],
                    [
                        "name" => "Content-Type",
                        "value" => 'multipart/alternative; boundary="XBoundary"'
                    ],
                    [
                        "name" => "Message-ID",
                        "value" => "EXAMPLE7c191be45-e9aedb9a-02f9-4d12-a87d-dd0099a07f8a-000000"
                    ]
                ],
                "headersTruncated" => false,
                "messageId" => "EXAMPLE7c191be45-e9aedb9a-02f9-4d12-a87d-dd0099a07f8a-000000",
                "sendingAccountId" => "123456789012",
                "source" => "sender@example.com",
                "tags" => [
                    "myCustomTag1" => [
                        "myCustomValue1"
                    ],
                    "myCustomTag2" => [
                        "myCustomValue2"
                    ],
                    "ses:caller-identity" => [
                        "ses_user"
                    ],
                    "ses:configuration-set" => [
                        "ConfigSet"
                    ],
                    "ses:from-domain" => [
                        "example.com"
                    ],
                    "ses:source-ip" => [
                        "192.0.2.0"
                    ]
                ],
                "timestamp" => "2017-08-09T23:50:05.795Z"
            ]
        ];
    }


    /**
     *
     * @group dns-sensitive
    */
    public function apiSnsEventSubscriptionConfirmation(FunctionalTester $I)
    {

        $I->haveHttpHeader("Content-Type","application/json");

        $event = [
            'Type' => 'SubscriptionConfirmation',
            'MessageId' => '165545c9-2a5c-472c-8df2-7ff2be2b3b1b',
            'TopicArn' => 'arn:aws:sns:us-west-2:649454681089:maladireta-bounces-producao',
            'Token' => '2336412f37',
            "Message" => [],
            'SubscribeURL' => "https://sns.us-west-2.amazonaws.com/?Action=ConfirmSubscription&Topicarn:aws:sns:us-west-2:649454681089:maladireta-bounces-producao&Token=2336412f37",
            'Timestamp' => '2012-04-25T21:49:25.719Z',
            'SignatureVersion' => '1',
            'Signature' => 'EXAMPLElDMXvB8r9R83tGoNn0ecwd5UjllzsvSvbItzfaMpN2nk5HVSw7XnOn/49IkxDKz8YrlH2qJXj2iZB0Zo2O71c4qQk1fMUDi3LGpij7RCW7AW9vYYsSqIKRnFS94ilu7NFhUzLiieYr4BKHpdTmdD6c0esKEYBpabxDSc=',
            'SigningCertURL' => 'https://sns.us-west-2.amazonaws.com/SimpleNotificationService-f3ecfb7224c7233fe7bb5f59f96de52f.pem',
            'UnsubscribeURL' => 'https://sns.us-west-2.amazonaws.com/?Action=Unsubscribe&Subscriptionarn:aws:sns:us-west-2:649454681089:maladireta-bounces-producao:2bcfbf39-05c3-41de-beaa-fcfcc21c8f55'
        ];

        $I->sendPOST('/v2/api/sns/snsEvent/', $event);

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiSnsEventNotificationBounce(FunctionalTester $I)
    {

        $I->amConnectedToDatabase("email");
        $I->haveInDatabase('email.envios',['dataenvio' => '2012-04-25 21:49:25', 'messageid' => '00000137860315fd-34208509-5b74-41f3-95c5-22c1edc3c924-000001']);

        $I->haveHttpHeader("Content-Type", "application/json");

        $event = $this->getEvent($this->getBounceMessage());

        $I->sendPOST('/v2/api/sns/snsEvent/', $event);

        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function apiSnsEventNotificationComplaint(FunctionalTester $I)
    {

        $I->amConnectedToDatabase("email");
        $I->haveInDatabase('email.envios',['dataenvio' => '2012-04-25 21:49:25', 'messageid' => '00000137860315fd-34208509-5b74-41f3-95c5-22c1edc3c924-000002']);

        $I->haveHttpHeader("Content-Type", "application/json");

        $event = $this->getEvent($this->getComplaintMessage());

        $I->sendPOST('/v2/api/sns/snsEvent/', $event);

        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function apiSnsEventNotificationOpen(FunctionalTester $I)
    {

        $I->haveHttpHeader("Content-Type", "application/json");

        $event = $this->getEvent($this->getOpenMessage());

        $I->sendPOST('/v2/api/sns/snsEvent/', $event);

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function apiSnsEventNotificationClick(FunctionalTester $I)
    {

        $I->haveHttpHeader("Content-Type", "application/json");

        $event = $this->getEvent($this->getClickMessage());

        $I->sendPOST('/v2/api/sns/snsEvent/', $event);

        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }
}
